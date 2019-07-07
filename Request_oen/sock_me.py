#-*- coding:utf-8 -*-
#author: HPU-i4mhmh github:i4mhmh

# 配置sniffer_me函数 测试指定端口连通性
# 配置多线程 加快端口扫描速度
# 配置主函数 增加一些功能，如port - port 导入模块optparse 进行配置 
# sock_me v1.1.1 2019 1.6
import socket 
from optparse import OptionParser
import threading
import re
import time
import requests

def where_ip(ip):
    Search_Ip = 'http://www.ip138.com/ips138.asp?ip='
    x = Search_Ip + ip
    r = requests.get(Search_Ip + ip)
    r = r.text.encode('latin1').decode('gbk')
    req = '<td align="center"><h1>(.*?)</h1></td>'
    get_title = re.findall(req,r)
    req = '<td align="center"><ul class="ul1"><li>本站数据：(.*?)</li>'
    Get_Place = re.findall(req,r)
    for title in get_title:
        print(title)
        for place in Get_Place:
            print('地点位于: ' + place + '网络')
    

#测试扫描端口是否成功
def sniffer_me(host,port):
    server = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    #对端口进行扫描 看是否能连接成功 并设置连接时间
    server.settimeout(0.5)
    try:
        server.connect((host,port))
        print('[H] %s:%s 端口处于开启状态'%(host,port))
        server.close()
        #成功输出xx端口打开
    except socket.timeout:
        print('[H] %s:%s 端口连接超时'%(host,port))
        server.close()
        #超出时间限制 失去连接

def fix_port(port):
    try:
        pattern = re.compile(r'(\d+)-(\d+)')    #解析连接符-模式
        match = pattern.match(port)
        if match:
            #print('分离端口')测试是否能正则匹配到端口
            First_port = int(match.group(1))
            End_port = int(match.group(2))     
            return (i for i in range(First_port,End_port+1))
        else:
            port = (port.split(','))
            return (list(map(int,port)))
        #修复了返回参数为str型数组的bug 返回int型
    except:
        print('出现异常')
        #修复了什么都说是端口异常的不正常操作
    
def main():
    '''ip = '220.181.57.216'
    threads = []
    for port in range(30,40):
        t = threading.Thread(target=sniffer_me,args=(ip,port))
        t.start()
        threads.append(t)
        '''
    print('<**********************welcome************************>')
    print('                         o(=•ェ•=)m                    ')
    time.sleep(0.2)
    print('                o(=•ェ•=)m         o(=•ェ•=)m                    ')
    time.sleep(0.2)
    print('            o(=•ェ•=)m    o(=•ェ•=)m     o(=•ェ•=)m                    ')
    time.sleep(0.2)
    print('        o(=•ェ•=)m  o(=•ェ•=)m   o(=•ェ•=)m   o(=•ェ•=)m           \n\n\n')
    #这里实现了多线程跑一个ip的端口的功能 - -
    usage = '缺少指定参数 -i<host> -p<port>'
    #在这里写一个提示
    parser = OptionParser(usage,version='v1.0.1')
    parser.add_option('-i',dest='ip_me',type='string',help='扫描的主机ip')
    parser.add_option('-p',dest='port_me',type='string',help='扫描的端口')
    #添加了optparse库 用起来方便些
    (options,args) = parser.parse_args()
    if options.ip_me == None or options.port_me ==None:
        print(parser.usage)
        #如果没有参数返回提醒
        return(0)
    else:
        ip_t = options.ip_me
        port_t = options.port_me
        print('[H] 当前时间: ' + time.strftime('%Y-%m-%d %H:%M:%S',time.localtime(time.time())))
        where_ip(ip_t)
        #显示当前时间和ip信息
        time.sleep(0.1)
        #ip_t为用户输入ip   port_t为用户输入端口号
        port = fix_port(port_t)
        for p in port:
            #print(p)
            t = threading.Thread(target=sniffer_me,args=(ip_t,p))
            t.start()
            t.join()
            time.sleep(0.5)
            #此处设置sleep函数,关掉并发执行,使用依次执行
        print('<************************拜拜*************************>')
            
main()

#本次设计对自己个人对time optparse re socket等各个库的理解又有所加深,在操作的过程中不断发现自己对程序理解的不足之处,好在及时查询百度,查看python文档,总算解决了所遇到的问题,此程序到此为止版本更新为                  sock_me v1.1.2                                                                                      2019.1.8
#解决了单端口输入不为int型数组的问题 sock_me v1.1.3                                                                                      2019.1.9
#加入了查询ip地址的新功能 使用的requests库 爬取http://www.ip138.com/ 的数据,爬下来ip的地址                              sock_me v1.1.4                                                                                       2019.1.10
#送给了李萍萍 希望老师能给她个好评!!!