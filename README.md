# tuling-robot
图灵机器人自动回复

## 安装
> composer require weiguoheng/tuling-robot

## 使用
```
  use think\Robot;

  class Help
  {
      //使用帮助
      public function index()
      {
        $reply = Robot::reply('你的appkey','你的秘钥','发送的消息');
      }
  }
```
