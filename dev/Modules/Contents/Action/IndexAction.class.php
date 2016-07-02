<?php

/**
 * 开发者：along
 * 联系邮箱:alonglovehome@163.com
 */
class IndexAction extends BaseAction {

    private $url;

    function _initialize() {
        parent::_initialize();
        import('Url');
        $this->url = new Url();
    }

    //首页
    public function index() {
        $page = isset($_GET[C("VAR_PAGE")]) ? $_GET[C("VAR_PAGE")] : 1;
        $page = max($page, 1);
        //模板处理
        $tp = explode(".", CONFIG_INDEXTP);
        $template = parseTemplateFile("Index:" . $tp[0]);
        $SEO = seo("", "", AppframeAction::$Cache['Config']['siteinfo'], AppframeAction::$Cache['Config']['sitekeywords']);

        //生成路径
        $urls = $this->url->index($page);
        $GLOBALS['URLRULE'] = $urls['page'];

        //seo分配到模板
        $this->assign("SEO", $SEO);
        //把分页分配到模板
        $this->assign(C("VAR_PAGE"), $page);
        $this->display("Index:" . $tp[0]);
    }

    //栏目列表 
    public function lists() {
        $catid = I('get.catid', 0, 'intval'); //栏目ID  
        $chu   = I('get.chu',0,'string');       //出场费
        $dai   = I('get.dai',0,'string');       //代言费
        $sex   = I('get.sex',0,'string');       //性别
        $diqu  = I('get.diqu',0,'string');      //地区
        $zhiye = I('get.zhiye',0,'string');     //职业
        $starname = I('get.starname',0,'string');  //名称
        if(empty($starname)){
            $starname = iconv("UTF-8","gb2312",$starname);
        }
        $page  = isset($_GET[C("VAR_PAGE")]) ? $_GET[C("VAR_PAGE")] : 1;  //分页
        if (!$catid) {
            $this->error("您没有访问该信息的权限！");
        }
        //echo $x;die;
        $this->assign("chu", $chu);
        $this->assign("dai", $dai);
        $this->assign("sex", $sex);
        $this->assign("diqu",$diqu);
        $this->assign("zhiye",$zhiye);
        $this->assign("starname",$starname);
        $this->categorys = F("Category");
        //获取栏目数据
        $category = $this->categorys[$catid];
        if (empty($category)) {
            $this->error("该栏目不存在！");
        }
        //栏目扩展配置信息反序列化
        $setting = unserialize($category['setting']);
        //生成静态分页数
        $repagenum = (int) $setting['repagenum'];
        if ($repagenum && !$GLOBALS['dynamicRules']) {
            //设置动态访问规则给page分页使用
            $GLOBALS['Rule_Static_Size'] = $repagenum;
            $GLOBALS['dynamicRules'] = CONFIG_SITEURL_MODEL . "index.php?a=lists&catid={$catid}&page=*";
        }
        //父目录
        $parentdir = $category['parentdir'];
        //目录
        $catdir = $category['catdir'];
        $filers = array('chu'=> $chu,'dai'=> $dai,'sex'=>$sex,'diqu'=>$diqu,'zhiye'=>$zhiye,'starname'=>$starname);
        //生成路径
        $category_url = $this->url->category_url($catid, $page,$filers);
        //取得URL规则
        $urls = $category_url['page'];
        //生成类型为0的栏目
        if ($type == 0) {
            //栏目首页模板
            $template = $setting['category_template'] ? $setting['category_template'] : 'category';
            //栏目列表页模板
            $template_list = $setting['list_template'] ? $setting['list_template'] : 'list';
            //判断使用模板类型，如果有子栏目使用频道页模板，终极栏目使用的是列表模板
            $template = $category['child'] ? "Category:" . $template : "List:" . $template_list;
            //去除后缀开始
            $tpar = explode(".", $template, 2);
            //去除完后缀的模板
            $template = $tpar[0];
            unset($tpar);
            $GLOBALS['URLRULE'] = $urls;
        }
        //把分页分配到模板
        $this->assign(C("VAR_PAGE"), $page);
        //分配变量到模板 
        $this->assign($category);
        //seo分配到模板
        $seo = seo($catid, $setting['meta_title'], $setting['meta_description'], $setting['meta_keywords']);
        $this->assign("SEO", $seo);
        //echo $template;die;
        $this->display($template);
    }

    /**
     * 内容页 
     */
    public function shows() {
        $catid = I('get.catid', 0, 'intval');
        $id = I('get.id', 0, 'intval');
        $page = intval($_GET[C("VAR_PAGE")]);
        $page = max($page, 1);
        if (!$id || !$catid) {
            $this->error("缺少参数！");
        }
        $this->categorys = F("Category");
        //获取当前栏目数据
        $category = $this->categorys[$catid];
        $pareinfo = $this->categorys[$category['parentid']];
        //print_r($category);die;
        $this->db = new Model("category");
        $info = $this->db->where("catid=".$category['parentid'])->find();
        //print_r($info);die;
        $this->assign("info",$info);
        $this->assign("category", $category);
        $this->assign("pareinfo", $pareinfo);
        //反序列化栏目配置
        $category['setting'] = unserialize($category['setting']);
        //模型ID
        $this->modelid = $category['modelid'];
        $this->db = ContentModel::getInstance($this->modelid);
        $data = $this->db->relation(true)->where(array("id" => $id, 'status' => 99))->find();
        if (empty($data)) {
            $this->error("该信息不存在！");
        }
        $this->db->dataMerger($data);
        //分页方式
        if (isset($data['paginationtype'])) {
            //分页方式 
            $paginationtype = $data['paginationtype'];
            //自动分页字符数
            $maxcharperpage = (int) $data['maxcharperpage'];
        } else {
            //默认不分页
            $paginationtype = 0;
        }
        //载入字段数据处理类
        if (!file_exists(RUNTIME_PATH . 'content_output.class.php')) {
            $this->error("请更新缓存后再操作！");
        }
        require_cache(RUNTIME_PATH . 'content_output.class.php');
        $content_output = new content_output($this->modelid);
        //获取字段类型处理以后的数据
        $output_data = $content_output->get($data);
        $output_data['id'] = $id;
        $output_data['title'] = strip_tags($output_data['title']);
        //SEO
        $seo_keywords = '';
        if (!empty($output_data['keywords'])) {
            $seo_keywords = implode(',', $output_data['keywords']);
        }
        $seo = seo($catid, $output_data['title'], $output_data['description'], $seo_keywords);

        //内容页模板
        $template = $output_data['template'] ? $output_data['template'] : $category['setting']['show_template'];
        //去除模板文件后缀
        $newstempid = explode(".", $template);
        $template = $newstempid[0];
        unset($newstempid);
        //分页处理
        $pages = $titles = '';
        //分页方式 0不分页 1自动分页 2手动分页
        if ($data['paginationtype'] == 1) {
            //自动分页
            if ($maxcharperpage < 10) {
                $maxcharperpage = 500;
            }
            //按字数分割成几页处理开始
            import('Contentpage', APP_PATH . C("APP_GROUP_PATH") . '/Contents/ORG');
            $contentpage = new Contentpage();
            $contentfy = $contentpage->get_data($output_data['content'], $maxcharperpage);
            //自动分页有时会造成返回空，如果返回空，就不分页了
            if (!empty($contentfy)) {
                $output_data['content'] = $contentfy;
            }
        }

        //分配解析后的文章数据到模板 
        $this->assign($output_data);
        //seo分配到模板
        $this->assign("SEO", $seo);
        //栏目ID
        $this->assign("catid", $catid);

        //分页生成处理
        //分页方式 0不分页 1自动分页 2手动分页
        if ($data['paginationtype'] > 0) {
            $urlrules = $this->url->show($data, $page);
            //手动分页
            $CONTENT_POS = strpos($output_data['content'], '[page]');
            if ($CONTENT_POS !== false) {
                $contents = array_filter(explode('[page]', $output_data['content']));
                $pagenumber = count($contents);
                $pages = page($pagenumber, 1, $page, 6, C("VAR_PAGE"), $urlrules['page'], true)->show("default");
                //判断[page]出现的位置是否在第一位 
                if ($CONTENT_POS < 7) {
                    $content = $contents[$page];
                } else {
                    $content = $contents[$page - 1];
                }
                //分页
                $this->assign("pages", $pages);
                $this->assign("content", $content);
            }
        } else {
            $this->assign("content", $output_data['content']);
        }
        $this->display("Show:" . $template);
    }
    
    public function ajaxsearch(){
    	if(IS_AJAX){
    		//要返回的html内容
    		$show = array();
    		$status = 1;
    		$catid = I('post.catid', 0, 'intval');
    		//按地区或店铺关键字搜索
    		$field = I('post.field', 0, 'intval');
    		if($field === 1){
    			$field = 'area';
    		}else if($field === 2){
    			$field ='title';
    		}
    		//过滤搜索关键字
            $keyword = Input::forSearch(safe_replace(I("request.keyword")));
            $keyword = htmlspecialchars(strip_tags($keyword));
    		
            //模糊搜索条件
            $map[$field]=array('like','%'.$keyword.'%');
            
            $item = "
				<li id='subbg4' class='f14'>专卖店分布
					<span id='shareimg' class='right'></span>
					<!-- JiaThis Button BEGIN -->
					<span class='jiathis_style right' style='border-top-width: 15px; margin-top: 11px;' >
						<span class='jiathis_txt'>分享到：</span>
						<a href='http://www.jiathis.com/share' class='jiathis jiathis_txt jiathis_separator jtico jtico_jiathis' target='_blank'></a>
						<a class='jiathis_counter_style'></a>
					</span>
					<script type='text/javascript' >
						var jiathis_config={
						summary:'',
						shortUrl:true,
						hideMore:false
						}
					</script>
					<script type='text/javascript' src='http://v3.jiathis.com/code_mini/jia.js' charset='utf-8'></script>
					<!-- JiaThis Button END -->
				</li>
            ";	//保存条目的html
            $content = '';//保存内容的html
			$Shop = M('shop');
			$data = $Shop->where($map)->select();
			if($data === false){
				$info = "网络出错，请稍后再试";
				$status = 0;
			}else if(!empty($data) && is_array($data)){
				foreach($data as $k => $v){
					$list = $k+1;
					if($list == 1){
						$item .="
							<li onmouseover='HoverLi({$list});' class='hovertab' id='tb_{$list}'>
								<a href='javascript:;'><h3>{$v['area']}</h3>
								<h4>{$v['address']}</h4></a>
							</li>
						";
						$content .="
		               		<div class='dis' id='tbc_0{$list}'>
		                          <img src='{$v['shopfront']}' width='417' height='378' /> 
		                          <div class='right'>
		                          		<div class='map'>{$v['map']}</div>
		                                <div class='address'>
		                                	<div class='address_0'>
		                                    	专卖店地址：<br />
												{$v['address']}
		                                    </div>
		                                    <div class='adress_1'>联系电话：{$v['phone']}</div>
		                                    <div class='adress_1'>营业时间：{$v['businesstime']}</div>
		                                </div>
		                          </div>                
		                    </div>
						";
					}else{
						$item .="
							<li onmouseover='HoverLi({$list});' class='normaltab' id='tb_{$list}'>
								<a href='javascript:;'><h3>{$v['area']}</h3>
								<h4>{$v['address']}</h4></a>
							</li>
						";
						$content .="
		               		<div class='undis' id='tbc_0{$list}'>
		                          <img src='{$v['shopfront']}' width='417' height='378' /> 
		                          <div class='right'>
		                          		<div class='map'>{$v['map']}</div>
		                                <div class='address'>
		                                	<div class='address_0'>
		                                    	专卖店地址：<br />
												{$v['address']}
		                                    </div>
		                                    <div class='adress_1'>联系电话：{$v['phone']}</div>
		                                    <div class='adress_1'>营业时间：{$v['businesstime']}</div>
		                                </div>
		                          </div>                
		                    </div>
						";
					}
				}
			}else{
				$info = "没有您要找的店铺！";
				$status = 0;
			}
			$show['item'] = $item;
			$show['content'] = $content;
			$this->ajaxReturn($show,$info,$status);
			
    	}
    }

}