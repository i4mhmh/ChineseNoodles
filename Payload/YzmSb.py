#-*- coding:utf-8 -*-
#抓取网页验证码到本地
#进行验证码识别 识别之后碰撞一次密码
#如果成功break 错误继续爆破

import pytesseract
import requests
from PIL import Image
from selenium import webdriver

driver = webdriver.Chrome()
driver.get('http://lab1.xseclab.com/vcode7_f7947d56f22133dbc85dda4f28530268/')
driver.maximize_window()
picture = driver.get_screenshot_as_file('a.png')

img = Image.open('a.png')
print(img.size)
box = (8,180,80,210)
#成功得到截下来的验证码
region = img.crop(box)
region.save('1.png')
#对验证码进行识别
vcode = pytesseract.image_to_string('1.png')
print(vcode)
#设置关闭
#driver.close()
