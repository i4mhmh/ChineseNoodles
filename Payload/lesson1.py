from PIL import Image,ImageDraw,ImageFont,ImageColor
def picture():
    #需要访问绝对路径 这里不知道哪里出问题了 相对路径应该也是可以的
    im = Image.open('D:/Git/ChineseNoodles/Payload/heao.jpg')
    #定义画笔对象
    draw = ImageDraw.Draw(im)
    #定义字体
    font = ImageFont.truetype('C:/Users/全世界的面我都吃一遍/Desktop/consola.ttf',size=40)
    #定义字体颜色
    fontcolor = ImageColor.colormap.get('blue')
    
    width,height = im.size
    #开始绘画
    draw.text((width-30,0),'1',font=font,fill=fontcolor)
    im.save('new.jpg','jpeg')

picture()