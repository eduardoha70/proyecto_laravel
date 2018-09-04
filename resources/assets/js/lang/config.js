import axios from 'axios'
import swal from 'sweetalert'

const token = document.head.querySelector('meta[name="csrf-token"]');

let axiosConf = {
  baseURL: window.location.protocol + '//' + window.location.host + '/api/',
  headers: {
    'X-CSRF-TOKEN': token.content
  }
}

export const reqXhr = axios.create(axiosConf)

reqXhr.interceptors.response.use(response => {
  return response;
}, error => {
  console.log(error.response.status)
  if(error.response.status == 401) {
    swal({
      title: 'Atención',
      text: "Se ha terminado la sesión",
      icon: 'warning',
      buttons: false,
      timer: 3000
    }).then(() => window.location.reload(true))
  }
  return Promise.reject(error);
});
