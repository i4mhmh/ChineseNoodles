#-*- coding:utf-8 -*-
import requests
r = requests.get('https://ss1.baidu.com/-4o3dSag_xI4khGko9WTAnF6hhy/image/h%3D300/sign=c422d4ad98cad1c8cfbbfa274f3f67c4/83025aafa40f4bfb0f815ad60e4f78f0f63618db.jpg')
with open ('1.jpg','wb') as f:
    f.write(r.content)
    f.close()
    print('图片保存成功')