#-*- coding:utf-8 -*-
import requests
import re
from lxml import etree
url = 'http://baozoumanhua.com/'
headers = {
'User-Agent':'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36'
}
r = requests.get(url).text
req = '<a href=(.*?) target="_blank">就想要个女朋友</a>'
r = re.findall(req,r)
print(r)