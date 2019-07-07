#-*- coding:utf-8 -*-
#author HPU-i4mhmh  github:i4mhmh tim、wechat:全世界的面我都吃一遍

#写一个构思图                                                                           ***
#实现socket模块扫描端口                                                 ***   ***   ***  *** ***  *** ***
#实现optparse模块接收参数
#threading模块进行多线程并发 ---设置了time限制 不喜欢排版乱所以放弃了并发线程
#requests爬取有用网站对ip进行解析
#优化用户体验 加入天气

import re
import socket
import argparse
import requests
from xpinyin import Pinyin

def fuck(place):
    p = Pinyin()
    a = p.get_pinyin(place,'')
    #获取地点
    req = '(.*?)sheng'
    p = re.findall(req,a)
    req = 'sheng(.*?)shi'
    c = re.findall(req,a)
    url ='http://qq.ip138.com/weather/' 
    province = p[0]
    city = c[0]
    search_weather=url + province + '/' + city + '.htm'
    #将地点字符串拼接在一起构造查询天气url
    weather = requests.get(search_weather)
    weather = weather.text.encode('latin1').decode('gbk')
    #得到目标url源码 正则抓取下来天气
    req = '<td width="20%">(.*?)</td>'
    day_me = re.findall(req,weather)     
    req = '<br/>(.*?)</td>'
    thing_me = re.findall(req,weather)
    print('您本地未来五天的天气为:')
    for i in range(0,5):
        print(day_me[i],thing_me[i]) 

def scan_me(ip,port):
    s = socket.socket(socket.AF_INET,socket.SOCK_STREAM)
    s.settimeout(1)
    #设置最大连接时间 超出此时间会返回连接超时
    try:
        s.connect((ip,port))
        print('[H]%s的%s端口处于开放状态'%(ip,port))
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
    fuck(Get_page[1])

def port_me(port):
    #获取端口并进行处理
    fix = re.compile(r'(\d+)-(\d+)')
    #匹配数字-数字类型输入
    get_port = fix.match(port)
    if get_port:
        first = int(get_port.group(1))
        end = int(get_port.group(2))
        return(i for i in range(first,end+1))
    else:
        port = (port.split(','))
        return (list(map(int,port)))


def main():
    tips = 'someting wrong!!!\n用法 i4mhmh_sock.py -i ip -p port\n使用-h查询更多帮助'
    #设置一个tips
    parse = argparse.ArgumentParser()
    parse.add_argument('-i',dest='ip',type=str,help='输入要扫描的ip呢')
    parse.add_argument('-p',dest='port',type=str,help='输入要扫描的端口呢 可以在扫描区间取例如80-90,80,90')
    args = parse.parse_args()
    if args.ip == None or args.port == None:
        print(tips)
        return
    else:
        ip = args.ip
        port = args.port
        port = port_me(port)
        for i in port:
            scan_me(ip,i)
        request_me(ip)
main()
#写的就那样吧  用法就是-i ip -p port       第一次做python的课程设计,功能的话不喜欢太单一的端口扫描,想多扩展几个有意思的模块,但咸鱼终是咸鱼,就爬爬虫,设置下多线程,正则匹配之类的,没什么新意,希望下次能够做出来更好一点的,加入IO操作     i4mhmh                                                                                                       time:2019.1.10