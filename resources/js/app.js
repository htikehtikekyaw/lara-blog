require('./bootstrap');

import Swal from 'sweetalert2';

window.showToast = function(x){
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
      
    Toast.fire({
        icon: 'success',
        title: x
    })
}