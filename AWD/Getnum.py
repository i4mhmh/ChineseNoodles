#-*-coding:utf-8 -*-
import requests
import re
s = requests.session()
#由于二次提交会导致session变化,所以我们获取第一次的session提交答案,这样既不会执行用户更新页面的操作
url = "http://lab1.xseclab.com/xss2_0d557e6d2a4ac08b749b61473a075be1/index.php"
r = s.get(url).text
h = re.findall('<br/>\s+(.*?)=',r)
#\s+执行换行操作
data = {'v':h}
res = s.post(url,data=data)
print(res.text)