@yield('css')

<!-- Bootstrap Css -->
<link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/css/settings.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<style>



.wrapper {
  max-width: 320px;
  /* margin: 2em auto; */
  position: fixed;
  bottom: 0px;  
  border: 2px solid #eee;
  border-radius: 2em;
}
.phone {
  /* border: 2px solid #eee;
  border-radius: 2em;
  
  position: relative;  */
  /* padding-bottom: 170%; 
  height: 0; 
  overflow: hidden; 
  width: 100%;
  height: auto;
  box-shadow: 0 40px 80px rgba(0,0,0,.15); */
}

.nav--icons {
  position: absolute;
  bottom: 2em;
  left: 1em;
  right: 1em;
}
.nav--icons ul {
  list-style-type: none;
  display: flex;
  flex-wrap: nowrap;
  justify-content: space-between;
  padding: 0;
  margin: 0;
}
.nav--icons ul li a {
  font-family: sans-serif;
  font-size: 11px;
  letter-spacing: 1px;
  text-decoration: none;
  color: #000;
  line-height: 1;
  vertical-align: middle;
  display: flex;
  align-items: center;
  border-radius: 3em;
  padding: 0.75em 1.25em;
  transition: 0.6s ease-in-out;
}
.nav--icons ul li a span {
  display: inline-block;
  overflow: hidden;
  max-width: 0;
  opacity: 0;
  padding-left: 0.5em;
  transform: translate3d(-0.5em, 0, 0);
  transition: opacity 0.6s, max-width 0.6s, transform 0.6s;
  transition-timing-function: ease-in-out;
}
.nav--icons ul li a:hover,
.nav--icons ul li a.is-active {
  color: #fff;
  background-color: #000;
}
.nav--icons ul li a:hover span,
.nav--icons ul li a.is-active span {
  opacity: 1;
  max-width: 50px;
  transform: translate3d(0, 0, 0);
}



</style>