function klick() {

  Swal.fire({
    title: 'Do you want to save the changes?',
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: 'Save',
    denyButtonText: `Don't save`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      // Swal.fire('Saved!', '', 'success')
      confirm = true;
    } else if (result.isDenied) {
      // Swal.fire('Changes are not saved', '', 'info')
      confirm = false;
    }
  })


}

