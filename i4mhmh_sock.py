#-*- coding:utf-8 -*-
#author HPU-i4mhmh  github:i4mhmh tim、wechat:全世界的面我都吃一遍

#写一个构思
#实现socket模块扫描端口
#实现optparse模块接收参数
#threading模块进行多线程并发
#requests爬取有用网站对ip进行解析
#优化用户体验

import re
import socket
import argparse
import requests

def scan_me(ip,port):
    port = int(port)
    s = socket.socket(socket.AF_INET,socket.SOCK_DGRAM)
    s.settimeout(1)
    #设置最大连接时间 超出此时间会返回连接超时
    try:
        s.connect((ip,port))
        print('[H]%s的%s端口处于开放状态'%(ip,port))
        s.close()
    except socket.timeout:
        print('[H]%s的%s端口连接超时'%(ip,port))
        s.close()
    except:
        print('程序遇到了不可预知的错误,请检查')
def request_me(url):
    header = {
        'User-Agent':'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36'
    }
    
    search = 'https://ip.cn/index.php?ip='
    fix_on = search + url
    r = requests.get(fix_on,headers=header)
    html = r.text
    req = '<code>(.*?)</code>'
    Get_page = re.findall(req,html)
    print('目的ip所在地址为: ' + Get_page[1])
    #爬虫抓取到目的ip所在地址

    #可以实现抓取自己ip所在地 同理
    r = requests.get('https://ip.cn/',headers=header)
    html = r.text
    req = '<code>(.*?)</code>'
    Get_page = re.findall(req,html)
    print('您的ip为:  '+Get_page[0])
    print('您的地址为: '+Get_page[1])
    
def main():
    parse = argparse.ArgumentParser()
    parse.add_argument('-i',dest='ip',type=str,help='输入要扫描的ip呢')
    parse.add_argument('-p',dest='port',type=str,help='输入要扫描的端口呢')
    args = parse.parse_args()
    ip = args.ip
    port = args.port
    scan_me(ip,port)
    request_me(ip)
main()