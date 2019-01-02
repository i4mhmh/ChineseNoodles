#coding = utf-8
import socket
import optparse
import re
import threading
import sys

def anlyze_host(target_host):
#将从--host参数获取到的目标值转换为标准的xxx.xxx.xxx.xxx形式，其中主要是利用socket的gethostbyname函数将域名形式的值转换为四位点进制形式
    try:
        pattern = re.compile(r'\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}') #匹配标准点进制的IP
        match = pattern.match(target_host)
        if match:
            return(match.group())
        else:
            try:
                target_host = socket.gethostbyname(target_host) #如果不是，就把target_host的值作为域名进行解析
                return(target_host)
            except Exception as err:
                print('地址解析错误：',err)
                exit(0)
    except Exception as err:
        print('请注意错误1：',sys.exc_info()[0],err)
        print(parser.usage)
        exit(0)
                    

def anlyze_port(target_port):
#解析--port参数传入的值，返回端口列表
    try:
        pattern = re.compile(r'(\d+)-(\d+)')    #解析连接符-模式
        match = pattern.match(target_port)
        if match:
            start_port = int(match.group(1))
            end_port = int(match.group(2))
            return([x for x in range(start_port,end_port + 1)])
        else:
            return([int(x) for x in target_port.split(',')])
    except Exception as err:
        print('请注意错误2:',sys.exc_info()[0],err)
        print(parser.usage)
        exit(0)

def scanner(target_host,target_port):
#创建一个socket对象
    s = socket.socket(socket.AF_INET,socket.SOCK_STREAM)
    s.settimeout(5)
    try:
        s.connect((target_host,target_port))
        print('[+]'+str(target_host) + '的' + str(target_port) + '端口:打开' ) #若可以建立连接，表示此端口是打开的
    except socket.timeout:
        print('[-]%s的%3s端口:关闭' % (target_host,target_port)) #如果连接超时，表示此端口关闭
    except Exception as err:
        print('请注意错误3:',sys.exc_info()[0],err)
        exit(0)


        
def main():
   usage = 'Usage:%prog --host <host> --port <port>'
   parser = optparse.OptionParser(usage,version='%prog v1.0')
   parser.add_option('-i','--ip',dest='target_host',type='string',
                     help='需要扫描的主机,域名或IP')
   parser.add_option('-p','--port',dest='target_port',type='string',
                    help='需要扫描的主机端口，支持1-100或21,53,80两种形式')
   (options,args) = parser.parse_args()
   if options.target_host == None or options.target_port == None:
      print(parser.usage)
      exit(0)
   else:
      target_host = options.target_host
      target_port = options.target_port

   target_host = anlyze_host(target_host)
   target_port = anlyze_port(target_port)

   for port in target_port:
      t = threading.Thread(target=scanner,args=(target_host,port))#多线程扫描端口
      t.start()

if __name__ == '__main__':
   main()