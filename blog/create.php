<?php
  include './Common/header.php';
?>
  <div id="content" class="inner">
    <div id="main-col" class="alignleft"><div id="wrapper">

      <article class="post">
      <div class="post-content">
         <form action="./action.php?a=create" method="POST">
            <div class="form-group">
                <label>标题</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="这里是标题" value="">
                <textarea style="display: none;" name="content" id="contents" ></textarea>
            </div>
            <div class="form-group">
                <label>内容</label>
                <div id="editor" class="text">
                    <p></p>
                </div>
                <p id="notice" class="hide">请先完成验证</p>
            </div>
            <button type="submit" class="btn btn-default" id="btns">提交</button>
            <script src="./public/js/jquery-3.2.1.min.js"></script>
            <script type="text/javascript" src="./public/js/wangEditor.min.js"></script>
            <script type="text/javascript">
                var E = window.wangEditor
                var editor = new E('#editor')
                // 或者 var editor = new E( document.getElementById('#editor') )
                editor.create()
                document.getElementById('btns').addEventListener('click',function(e){
                  //读取 html
                  // alert(editor.txt.html());
                  //  // 读取 text
                  //  alert(editor.txt.html());
                  document.getElementById('contents').value = editor.txt.html();
                  //判断如果title为空的话就提示错误信息，并且不能提交数据
                  if ($('#title').val() == '') {
                    $("#notice")[0].className = "show";
                    $("#notice").html('文章标题不能为空');
                     setTimeout(function(){
                      $("#notice")[0].className = "hide";
                     }, 2000);
                     e.preventDefault();
                     return;
                  }

                  //判断如果content内容少于50个字符的话，就显示错误信息，并且不能提交数据
                  if ($('#contents').val().length < 50) {
                    $("#notice")[0].className = "show";
                    $("#notice").html('文章内容不能少于50个字符');
                       setTimeout(function(){
                      $("#notice")[0].className = "hide";
                     }, 2000);
                     e.preventDefault();
                     return;
                  }



                },false);
            </script>
        </form>
        <br>
    <nav id="pagination">
        <div class="clearfix"></div>
    </nav>
      </div>
    </article>
    <nav id="pagination">
      <div class="clearfix"></div>
    </nav>
    </div></div>
    <aside id="sidebar" class="alignright">
      <div class="search">
        <!-- <form action="//google.com/search" method="get" accept-charset="utf-8"> -->
        <form action="./search.php" method="get" accept-charset="utf-8">
          <input type="search" name="q" results="0" placeholder="Suche">
        </form>
      </div>
       <br>
    <section id="comment">
      <h1 class="title" style="font-size: 18px;">友情连接</h1>
      <div class="hr"></div>
      <div id="fb-root">
        <a href="http://www.3maio.com" target="_blank">Cpphp</a>
      </div>
    </section>
    </aside>
    <div class="clearfix"></div></div>
<?php
  include './Common/footer.php';
?>