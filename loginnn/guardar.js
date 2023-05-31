function alerta_eliminar(codigo){

  Swal.fire({
  title: 'Estas Seguro?',
  text: "Esta accion no tiene reversa",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Cancelar',

  confirmButtonText: 'Si, eliminalo!'
}).then((result) => {
  if (result.isConfirmed) {
    mandar_php(codigo)
  }
})
}
function mandar_php(codigo){
  parametros = {id: codigo};
  $.ajax({
    data: parametros,
    url: "eliminar.php",
    type: "POST",
    beforeSend: function() {},
    success: function(){
      Swal.fire("Eliminado!","Tu registro ha sido eliminado", "correctamente").then((result)=>{
        window.location.href = "portafolio.php"
      });
    },
  });

}
