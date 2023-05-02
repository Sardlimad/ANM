<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>ANM</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      
      Developed by <a href="https://www.github.com/sardlimad">Sardlimad</a>
    </div>
  </footer>

  <script>
    //Modificar campos segun categoria
    function verificar() {

        switch (document.getElementById('category').value) {
            case 'Instrumento':
                document.getElementById('serial_label').innerHTML = 'No.Serie';
                break;
            case 'Libro':
                document.getElementById('serial_label').innerHTML = 'ISBN';
                break;
            case 'Accesorio':
                document.getElementById('serial_label').innerHTML = 'No.Serie';
                break;
        }

    }
</script>