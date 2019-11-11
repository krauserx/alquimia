function alerttoastr(tipo, body, title, position) {
  if (tipo==='success') {
    toastr.success(body,title,{positionClass:"toast-"+position,timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
  }else if (tipo==='info') {
    toastr.info(body,title,{positionClass:"toast-"+position,timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
  }else if (tipo==='warning') {
    toastr.warning(body,title,{positionClass:"toast-"+position,timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
  }else if (tipo==='error') {
    toastr.error(body,title,{positionClass:"toast-"+position,timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
  }

}
