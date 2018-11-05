Vue.component('w-modal', {
	props: ['active'],
	template:'<div class="modal-backdrop fade" v-bind:class="modalclass">\
				<div class="modal fade" v-bind:class="modalclass" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">\
				  <div class="modal-dialog modal-dialog-centered" role="document">\
				    <div class="modal-content">\
				      <div class="modal-header">\
				        <h5 class="modal-title" id="exampleModalLabel"></h5>\
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">\
				          <span aria-hidden="true">&times;</span>\
				        </button>\
				      </div>\
				      <div class="modal-body" id="modal-body">\
				      </div>\
				      <div class="modal-footer">\
				        <span id="actions"></span> <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeself">关 闭</button>\
				      </div>\
				    </div>\
				  </div>\
				</div>\
			</div>',
	methods: {    
	    closeself() {
	    	this.modalclass=''      
	    }
  	},
	computed:{
                modalclass:function(){
                    return (this.active=='show')?('show d-block'):('d-none')
                }
      }
})