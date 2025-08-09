document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("formAbono");
  const ddlCompra = document.getElementById("ddlCompra");
  const saldoAnteriorInput = document.getElementById("saldoAnterior");
  const montoInput = document.getElementById("txtMonto");

  if (ddlCompra) {
    ddlCompra.addEventListener("change", function () {
      const opt = ddlCompra.options[ddlCompra.selectedIndex];
      const saldo = parseFloat(opt.getAttribute("data-saldo")) || 0;
      saldoAnteriorInput.value = saldo;
    });
  }

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const saldo = parseFloat(saldoAnteriorInput.value);
    const abono = parseFloat(montoInput.value);

    if (isNaN(abono) || abono <= 0) {
      Swal.fire({
        icon: "warning",
        title: "Monto inválido",
        text: "Ingresa un monto de abono mayor a 0."
      });
      return;
    }

    if (!isNaN(saldo) && abono > saldo) {
      Swal.fire({
        icon: "warning",
        title: "Validación",
        text: "El abono no puede ser mayor al saldo anterior."
      });
      return;
    }

    const formData = new FormData(form);
    // Asegura que el controller detecte la intención
    if (!formData.has("btnRegistrarAbono")) {
      formData.append("btnRegistrarAbono", "1");
    }

    fetch("../../Controllers/abonosController.php", {
      method: "POST",
      body: formData
    })
      .then((res) => res.json())
      .then((data) => {
        if (data.status === "success") {
          Swal.fire({
            icon: "success",
            title: "¡Registro Exitoso!",
            text: data.message,
            confirmButtonText: "Aceptar",
            confirmButtonColor: '#a5dc86'
          }).then(() => {
            window.location.href =
              "/Practica3_Grupo4/Views/Home/consultarProductos.php";
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: data.message || "No se pudo registrar el abono."
          });
        }
      })
      .catch((err) => {
        console.error(err);
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Ocurrió un problema al procesar la solicitud."
        });
      });
  });
});