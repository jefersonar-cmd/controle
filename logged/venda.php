<div class="container-flex text-center">
     <div class="link">
          <button class="btn btn-primary" onclick="openNewWindow()"> Abrir PDV <i class="material-icons" >open_in_new</i></button>
     </div>
</div>

<style>
     .link {
          display: flex;
          width: 100%;
          height:25rem;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          background-color: black;
     }
</style>
<script>
     function openNewWindow () {
          window.open('http://localhost/logged/pdv/', 'PDV', 'toolbar=no, location=no, direction=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1280, height=720');
     }
</script>