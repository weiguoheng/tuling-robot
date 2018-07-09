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
        $reply = Robot::reply('889ec96903fc4948845497850c3ede23','2ed3d583c834e94f1','北京的天气');
      }
  }
```
