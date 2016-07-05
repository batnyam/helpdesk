<footer>
  <div class="col-md-10 col-md-offset-1">

    <span>
      <span class="pull-left">
        <span class="navs">
          <li>{{ trans('homepage.home') }}</li>
          <li>{{ trans('homepage.about') }}</li>
          <li>{{ trans('homepage.question') }}</li>
          <li>{{ trans('homepage.contact') }}</li>
        </span>
      </span>
      <span class="pull-right lang">
          <li><a href="/language-en">ENG</a></li>
          <li><a href="/language-mn">MON</a></li>
      </span>
    </span>

    <span>
      <span class="pull-left">2016 Helpdesk</span>
      <span class="pull-right social">
        <li><i class="fa fa-facebook"></i></li>
        <li><i class="fa fa-twitter"></i></li>
        <li><i class="fa fa-github"></i></li>
      </span>
    </span>
  </div>
</footer>
<style>
footer {
  width: 100%;
  float: left;
  height: 100px;
  padding: 20px;
  background: #131313;
  color: #fff;
  font-size: 12px;
}
footer div>span {
  width: 100%;
  float: left;
}
footer div>span:last-child {
  margin-top: 20px;
}
.navs  li {
  padding-right: 20px;
  text-transform: uppercase;
}
.navs li:after {
  margin-left: 20px;
  content: '|';
}
.navs li:last-child:after {
  content: '';
}
.lang li:after {
  content: "|";
  margin: 0 20px;
}
.lang li:last-child:after{
  content: '';
  margin: 0;
}
.social li {
  margin-left: 10px;
  font-size: 16px;
}
</style>
