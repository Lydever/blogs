
import React, { Component } from 'react'
import { Breadcrumb } from 'antd';
import {withRouter} from 'react-router-dom'
 
// 将路由和匹配文字映射在一起
const breadcrumbNameMap = {
    '/home': '首页',
    '/user': '用户管理',
    '/role': '角色管理',
    '/product': '商品管理',
    '/product/category': '品种管理',
    '/product/list': '商品列表',
    '/chart': '信息统计',
    '/chart/bar': '柱状图',
    '/chart/line': '折线图',
    '/chart/pie': '饼状图',
}
let UNLISTEN;
class MyMianBaoNav extends Component {
    constructor(){
        super();
        this.state={
            pathSnippets: null, //这个变量用于存放path
            extraBreadcrumbItems: null,  //这个变量用于存放面包屑的组件
        }
    }
    getPath=()=>{
        //获取当前的路由地址
        const res=this.props.history.location.pathname.split('/').filter(i=>i)     
        const arr=res.map((_,index)=>{
            let url=`/${res.slice(0,index+1).join('/')}`;
            return <Breadcrumb.Item key={url}>{breadcrumbNameMap[url]}</Breadcrumb.Item>
        })
        // 将这个结果，更新到页面
        this.setState({
            extraBreadcrumbItems:arr
        })
    }
    componentDidMount(){
        this.getPath();
        // 监听路由产生变化 addEventListener()
        UNLISTEN = this.props.history.listen(()=>{
            this.getPath()
        })
    }
    componentWillUnmount(){
        // 取消事件监听
        UNLISTEN && UNLISTEN();
    }
    render() {
        return (
            <Breadcrumb style={{height:'60px',lineHeight:'60px',borderBottom:'1px solid #ccc',marginBottom:'20px'}}>
                {this.state.extraBreadcrumbItems}
            </Breadcrumb>
        )
    }
}
export default withRouter(MyMianBaoNav)