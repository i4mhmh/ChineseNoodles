import requests
from lxml import etree
import re
from urllib.request import urlretrieve
import time
def dowload(url):
    r = requests.get(url).text
    #处理成可解析对象
    r = etree.HTML(r)
    # <div class="vervideo-bd">
    #<a href="video_1501241" class="vervideo-lilink actplay">
    video_id = r.xpath('//div[@class="vervideo-bd"]/a/@href')
    #得到视频id
    video_url = []
    for id in video_id:
        start_url = 'https://www.pearvideo.com/'+ id
        video_url.append(start_url)
#得到视频播放地址
    for play_url in video_url:
        html = requests.get(play_url).text
        #得到第二级源代码
        req ='srcUrl="(.*?)"'
        req = re.compile(req)
        #增加效率
        ture_url =re.findall(req,html)
        #得到视频的根url
        req = '<h1 class="video-tt">(.*?)</h1>'
        pname = re.findall(req,html)
        print('正在下载%s'%pname[0])
        #下载url
        urlretrieve(ture_url[0],'./video/%s.mp4'%pname)
        time.sleep(3)

def new_page():
    n=12
    while True:
        if n >48:
            return
        #实现翻页功能
        url = 'https://www.pearvideo.com/category_loading.jsp?reqType=5&categoryId=10&start=%d'%n
        n+=12
        #调用dowload
        dowload(url)
new_page()