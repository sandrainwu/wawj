var WaAlertBox = {
    containerClass: 'modal-backdrop fade show d-block',
    modalClass:'modal fade show d-block',
    textTemplate: {
        title: '提示信息',
        content: '提示内容',
        okBtn: '好的',
        cancelBtn: '取消',
        contentColor: '#000000',
        promptTitle: '请输入内容',
        promptOkBtn: "确认",
    },
    commTemplate: function(content,buttons){
        return  '<div class="modal-dialog modal-dialog-centered">'+
                    '<div class="modal-content" tabindex=-1>'+
                        '<div class="modal-header">'+
                            '<h5>' + this.textTemplate.title + '</h5>'+'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>'+
                        '</div>'+
                        '<div class="modal-body">'+
                            content +
                        '</div>'+
                        '<div class="modal-footer">'+
                            buttons+
                        '</div>'+
                    '</div>'+
                '</div>'
    },
    modalCover:function(){
        var box = document.createElement("div")
        box.className = this.containerClass;
        document.body.appendChild(box);
        
    },
    buttons: function(btn){
        switch(btn){
        case 'ok':
          return '<button class="btn btn-primary btn-ok">'+this.textTemplate.okBtn+'</button>';
          break;
        case 'cancel':
          return '<button class="btn btn-secondary btn-cancel">'+this.textTemplate.cancelBtn+'</button>';
          break;
        default:
          return '<button class="btn btn-primary btn-ok">'+ this.textTemplate.okBtn+'</button>';
        }
    },
    alertTemplate: function () {
        return this.commTemplate(this.textTemplate.content,this.buttons('ok'))
    },
    confirmTemplate: function () {
        btn=this.buttons('cancel')+this.buttons('ok')
        return this.commTemplate(this.textTemplate.content,btn)
    },
    promptTemplate: function () {
        btn=this.buttons('cancel')+this.buttons('ok')
        return this.commTemplate(this.textTemplate.content,btn)
    },
    alert: function (opt) {
        this.textTemplate.title = opt.title || this.textTemplate.title;
        this.textTemplate.content = opt.content || this.textTemplate.content;
        this.textTemplate.okBtn = opt.okBtn || this.textTemplate.okBtn;
        this.textTemplate.okBtnColor = opt.okBtnColor || this.textTemplate.okBtnColor;
        this.textTemplate.contentColor = opt.contentColor || this.textTemplate.contentColor;
        _this = this;
        var modal = document.createElement("div");
        modal.className = this.modalClass;
        modal.innerHTML = this.alertTemplate();
        document.body.appendChild(modal)
        
        this.modalCover();
        
        var btn = document.getElementsByClassName('btn-ok');
        btn[btn.length - 1].focus();
        btn[btn.length - 1].onclick = function () {
            if (opt.onConfirm) {
                opt.onConfirm();
            }
            _this.removeBox();
        }
        var closeBtn = document.getElementsByClassName('close');
        closeBtn[closeBtn.length - 1].onclick = function () {
            _this.removeBox();
        }
    },
    confirm: function (opt) {
        this.textTemplate.title = opt.title || this.textTemplate.promptTitle;
        this.textTemplate.promptPlaceholder = opt.promptPlaceholder || this.textTemplate.promptPlaceholder;
        this.textTemplate.okBtn = opt.okBtn || this.textTemplate.promptOkBtn;
        this.textTemplate.okBtnColor = opt.okBtnColor || this.textTemplate.okBtnColor;
        this.textTemplate.cancelBtn = opt.cancelBtn || this.textTemplate.cancelBtn;
        this.textTemplate.cancelBtnColor = opt.cancelBtnColor || this.textTemplate.cancelBtnColor;
        this.textTemplate.content = opt.content || this.textTemplate.content;
        _this = this;
        this.modalCover();
        var modal = document.createElement("div");
        modal.className = this.modalClass;
        modal.innerHTML = this.confirmTemplate();
        document.body.appendChild(modal)


        var okBtn = document.getElementsByClassName('btn-ok');
        okBtn[okBtn.length - 1].focus();
        okBtn[okBtn.length - 1].onclick = function () {
            if (opt.onConfirm) {
                opt.onConfirm();
            }
            _this.removeBox();
        }
        var cancelBtn = document.getElementsByClassName('btn-cancel');
        cancelBtn[cancelBtn.length - 1].onclick = function () {
            if (opt.onCancel) {
                opt.onCancel();
            }
            _this.removeBox();
        }
        var closeBtn = document.getElementsByClassName('close');
        closeBtn[closeBtn.length - 1].onclick = function () {
            _this.removeBox();
        }
    },
    prompt: function (opt) {
        this.textTemplate.title = opt.title || this.textTemplate.title;
        this.textTemplate.content = opt.content || this.textTemplate.content;
        this.textTemplate.contentColor = opt.contentColor || this.textTemplate.contentColor;
        this.textTemplate.okBtn = opt.okBtn || this.textTemplate.okBtn;
        this.textTemplate.okBtnColor = opt.okBtnColor || this.textTemplate.okBtnColor;
        this.textTemplate.cancelBtn = opt.cancelBtn || this.textTemplate.cancelBtn;
        this.textTemplate.cancelBtnColor = opt.cancelBtnColor || this.textTemplate.cancelBtnColor;
        _this = this;
        this.modalCover();
        var modal = document.createElement("div");
        modal.className = this.modalClass;
        modal.innerHTML = this.promptTemplate();
        document.body.appendChild(modal)

        var okBtn = document.getElementsByClassName('btn-ok');
        okBtn[okBtn.length - 1].onclick = function () {
            if (opt.onConfirm) {
                opt.onConfirm('ok');
            }
            _this.removeBox();
        }
        var cancelBtn = document.getElementsByClassName('btn-cancel');
        cancelBtn[cancelBtn.length - 1].onclick = function () {
            if (opt.onCancel) {
                opt.onCancel('cancel');
            }
            _this.removeBox();
        }
        var closeBtn = document.getElementsByClassName('close');
        closeBtn[closeBtn.length - 1].onclick = function () {
            _this.removeBox();
        }
    },
    removeBox: function () {
        var modal = document.getElementsByClassName(this.modalClass);
        document.body.removeChild(modal[modal.length - 1]);
        var box = document.getElementsByClassName(this.containerClass);
        document.body.removeChild(box[box.length - 1]);
    }
};
