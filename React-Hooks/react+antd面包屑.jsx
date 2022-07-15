
import React from "react";
import { Link, withRouter } from "react-router-dom";
import { Breadcrumb } from "antd";
import { setLocal, getLocal } from '@utils/index';
import { HomeOutlined } from '@ant-design/icons';

const breadcrumbTitleMap = {
  'bigdata/': '首页',
  'bigdata/home':'首页',

  // 综合画像
  '/mainframe/xingweihuaxiang': '学生画像',
  '/mainframe/xingweihuaxiang/all': '群体画像',
  '/mainframe/xingweihuaxiang/personal': '个人画像',
  '/mainframe/xingweihuaxiang/student/portraitsSurvey':'画像概况',
  '/mainframe/xingweihuaxiang/personal/details':'个人画像详情',
  '/mainframe/xingweihuaxiang/poor': '贫困生群体画像',

  // 预警
  '/mainframe/comprehensivewarning': '预警',
  '/mainframe/comprehensivewarning/overview': '预警概况',
  '/mainframe/comprehensivewarning/miss':  '失联预警',
  '/mainframe/comprehensivewarning/back': '宿舍异常行为预警',
  '/mainframe/comprehensivewarning/network':  '沉迷网络预警',
  '/mainframe/comprehensivewarning/badnetwork': '不良网站预警',
  '/mainframe/comprehensivewarning/hearthealth': '心理健康预警',
  '/mainframe/systemsetup/earlywarningsetting': '预警规则设置',
  '/mainframe/systemsetup/earlywarningwhitelist': '预警白名单设置',

  // 预测
  '/mainframe/yuce':'预测',
  '/mainframe/yuce/poor':'贫困预测',
  '/mainframe/yuce/xueye': '学业预测',
  '/mainframe/yuce/byqx':'毕业去向预测',

  // 学生基础数据查询
  '/bigdata/base':'学生基础数据查询',
  '/bigdata/base/xuanke':'选课查询',
  '/bigdata/base/chengji':'成绩查询',
  '/bigdata/base/book':'图书查询',
  '/bigdata/base/network':'上网查询',
  '/bigdata/base/cost':'消费查询',
  '/bigdata/behavior/building':'资助金发放查询',
  '/bigdata/base/susheinout':'宿舍进出查询',

  // 系统管理
  '/mainframe/accessmanage': '系统管理',
  '/mainframe/accessmanage/account': '用户管理',
  '/mainframe/accessmanage/authority': '角色权限管理',
  '/mainframe/accessmanage/menu': '菜单管理',
  '/mainframe/systemsetup/log': '日志管理'

};

const BreadcrumbNav = withRouter((props) => {
  const { location } = props;
  const currentPaths = props.location.pathname.split("/").filter((i) => i);
  const extraBreadcrumbItems = currentPaths.map((_, index) => {
    const url = `/${currentPaths.slice(0, index + 1 ).join("/")}`;
    return (
      <Breadcrumb.Item key={url}>
        <Link to={url}></Link>
        {breadcrumbTitleMap[url]}
      </Breadcrumb.Item>
    );
  });
  const breadcrumbItems = [
      <Breadcrumb.Item key="home"><Link to="/"><HomeOutlined /></Link></Breadcrumb.Item>
    //  <Breadcrumb.Item onClick={() => { props.history.push(getLocal('LastBreadcrumb')); }}>{this.state.first}</Breadcrumb.Item>
  ].concat(extraBreadcrumbItems);
  return (
    <div className="">
      <Breadcrumb>
        {breadcrumbItems}
      </Breadcrumb>
    </div>
  );
});
export default BreadcrumbNav;



// 可以

import React from "react";
import { Link, withRouter } from "react-router-dom";
import { Breadcrumb } from "antd";
import { setLocal, getLocal } from '@utils/index';
import { HomeOutlined } from '@ant-design/icons';

const breadcrumbTitleMap = {
  'bigdata/': '首页',
  'bigdata/home':'首页',

  // 综合画像
  '/mainframe/xingweihuaxiang': '学生画像',
  '/mainframe/xingweihuaxiang/all': '群体画像',
  '/mainframe/xingweihuaxiang/personal': '个人画像',
  '/mainframe/xingweihuaxiang/student/portraitsSurvey':'画像概况',
  '/mainframe/xingweihuaxiang/personal/details':'个人画像详情',
  '/mainframe/xingweihuaxiang/poor': '贫困生群体画像',

  // 预警
  '/mainframe/comprehensivewarning': '预警',
  '/mainframe/comprehensivewarning/overview': '预警概况',
  '/mainframe/comprehensivewarning/miss':  '失联预警',
  '/mainframe/comprehensivewarning/back': '宿舍异常行为预警',
  '/mainframe/comprehensivewarning/network':  '沉迷网络预警',
  '/mainframe/comprehensivewarning/badnetwork': '不良网站预警',
  '/mainframe/comprehensivewarning/hearthealth': '心理健康预警',
  '/mainframe/systemsetup/earlywarningsetting': '预警规则设置',
  '/mainframe/systemsetup/earlywarningwhitelist': '预警白名单设置',

  // 预测
  '/mainframe/yuce':'预测',
  '/mainframe/yuce/poor':'贫困预测',
  '/mainframe/yuce/xueye': '学业预测',
  '/mainframe/yuce/byqx':'毕业去向预测',

  // 学生基础数据查询
  '/bigdata/base':'学生基础数据查询',
  '/bigdata/base/xuanke':'选课查询',
  '/bigdata/base/chengji':'成绩查询',
  '/bigdata/base/book':'图书查询',
  '/bigdata/base/network':'上网查询',
  '/bigdata/base/cost':'消费查询',
  '/bigdata/behavior/building':'资助金发放查询',
  '/bigdata/base/susheinout':'宿舍进出查询',

  // 系统管理
  '/mainframe/accessmanage': '系统管理',
  '/mainframe/accessmanage/account': '用户管理',
  '/mainframe/accessmanage/authority': '角色权限管理',
  '/mainframe/accessmanage/menu': '菜单管理',
  '/mainframe/systemsetup/log': '日志管理'

};

const BreadcrumbNav = withRouter((props) => {
  const { location } = props;
  const currentPaths = props.location.pathname.split("/").filter((i) => i);
  console.log("fffffffff:" + props.location.pathname)
  const extraBreadcrumbItems = currentPaths.map((_, index) => {
    const url = `${currentPaths.slice(0, index + 1 )}`;
    return (
      <Breadcrumb.Item key={url}>
        <Link to={url}></Link>
        {breadcrumbTitleMap[url]}
      </Breadcrumb.Item>
    );
  });
/*  const breadcrumbItems = [
      <Breadcrumb.Item key="home"><Link to="/">{props.location.pathname}</Link></Breadcrumb.Item>
    //  <Breadcrumb.Item onClick={() => { props.history.push(getLocal('LastBreadcrumb')); }}>{this.state.first}</Breadcrumb.Item>
  ].concat(extraBreadcrumbItems);*/
  return (
    <div className="">
      <Breadcrumb>
        <Breadcrumb.Item> {props.location.pathname} </Breadcrumb.Item>
      </Breadcrumb>
    </div>
  );
});
export default BreadcrumbNav;



