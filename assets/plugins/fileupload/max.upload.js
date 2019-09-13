(function($){
  var maxupload, settings, defaultOptions, __bind;
  __bind = function(fn, me) {
    return function() {
      return fn.apply(me, arguments);
    };
  };

  defaultOptions = {
    url:'', //for upload temp if not support filereader html5
    maxHeight : 283,
    maxWidth : 283,
    filenameid : '',
    photo:'img/upload-foto.png',
    delete: function(){},
    ready: function(){},
    complete: function(){}
  };

  maxupload = (function(options) {
    function maxupload(handler, options){
      this.handler = handler;
      this.edit_tools = null;
      this.holder = null;
      this.aholder = null;
      this.preview = null;
      this.raw_image = null;
      this.filename_image = null;
      this.zoom = null;
      this.rotate = 0;
      this.uploading = false;
      this.imagetemp = null;
      this._data = null;
      this.time_fade = null;
      this.is_loading = false;
      this._element = null;
      this.__element = null;
      this.draging = false;
      this.start_pos = null;
      this.element_pos = null;
      this.end_pos = null;
      this.photo = 'img/upload-foto.png';
      this._info = null;
      this.ready;
      this.delete;
      this.complete;
      $.extend(true, this, defaultOptions, options);

      this.update = __bind(this.update, this);
      this.init = __bind(this.init, this);
      this.addEvent = __bind(this.addEvent, this);
      this.doneEvent = __bind(this.doneEvent, this);
      this.imgLoad = __bind(this.imgLoad, this);
      this.preReadLoad = __bind(this.preReadLoad, this);
      this.readLoad = __bind(this.readLoad, this);
      this.showImage = __bind(this.showImage,this);
      this.show_loading = __bind(this.show_loading,this);
      this.hide_loading = __bind(this.hide_loading,this);
      this.show_edit_tools = __bind(this.show_edit_tools,this);
      this.deleteEvent = __bind(this.deleteEvent,this);
      this.zoomInEvent = __bind(this.zoomInEvent,this);
      this.zoomOutEvent = __bind(this.zoomOutEvent,this);
      this.rotateLeftEvent = __bind(this.rotateLeftEvent,this);
      this.rotateRightEvent = __bind(this.rotateRightEvent,this);
      this.startEvent = __bind(this.startEvent,this);
      this.timeoutEndEvent = __bind(this.timeoutEndEvent,this);
      this.endEvent = __bind(this.endEvent,this);
      this.mouseStartEvent = __bind(this.mouseStartEvent,this);
      this.touchStartEvent = __bind(this.touchStartEvent,this);
      this.mouseMoveEvent = __bind(this.mouseMoveEvent,this);
      this.touchMoveEvent = __bind(this.touchMoveEvent,this);
      this.endDragingEvent = __bind(this.endDragingEvent,this);
      this.completeEvent = __bind(this.completeEvent,this);
      this.adjust_img = __bind(this.adjust_img,this);
      this.updateInfo = __bind(this.updateInfo,this);
      this.init();
      return maxupload;
    } 
    maxupload.prototype.update = function(options) {
      $.extend(true, this, options);
    };
    maxupload.prototype.init = function(){
      _html = '<div id="holder" class="preview" style="overflow:hidden;height:'+this.maxHeight+'px;width:'+this.maxWidth+'px;position:relative;border: 1px solid #D2D6DE;z-index: 2;">'+
                '<img id="preview" src="" style="display:none;cursor:move;position:absolute;-ms-touch-action: none">'+
                '<a href="javascript:void(0)" style="height:'+this.maxHeight+'px;width:'+this.maxWidth+'px;">'+
                  '<img parse_params="1" alt="upload-foto.png" src="'+this.photo+'" style="position:absolute;height:'+this.maxHeight+'px;width:'+this.maxWidth+'px;">'+
                  '<span id="edit" class="btn-foto foto_btn_edit">Change Photo</span>'+
                '</a>'+
                '<div id="edit-tools" style="display:none;">'+
                  '<div id="left-tools" style="position:absolute;z-index:200;width: 72px;">'+
                    '<span id="zoom-in" class="glyphicon glyphicon-zoom-in btn-foto btn-foto-bg"></span>'+
                    '<span id="zoom-out" class="glyphicon glyphicon-zoom-out btn-foto btn-foto-bg"></span>'+
                    '<span id="rotate-right" class="glyphicon glyphicon-repeat btn-foto btn-foto-bg" style="display:none;"></span>'+
                  '</div>'+
                  '<div id="top-tools" style="position:absolute;z-index:200;">'+
                    '<span id="delete" class="glyphicon glyphicon-remove btn-foto btn-foto-bg"></span>'+
                    '<button type="button" id="submit" style="display:none;">V</button>'+
                  '</div>'+
                  '<div id="bot-tools" style="style="display:none;"position:absolute;z-index:200;bottom:0px;background-color:gray;color:white;padding:2px 5px 0px;">'+
                    'x:<input type="text" id="x" style="width:40px"/>px,y:<input type="text" id="y" style="width:40px"/>px,w:<input type="text" id="w" style="width:40px"/>px,h:<input type="text" id="h" style="width:40px"/>px'+
                  '</div>'+
                '</div>'+
              '</div>'+
              '<div id="warp_filename" style="height:'+this.maxHeight+'px;width:'+this.maxWidth+'px;overflow:hidden;position: relative;top: '+(this.maxHeight*-1)+'px;cursor:pointer;">'+
                '<input id="'+this.filenameid+'" type="file" accept="image/*" name="'+this.filenameid+'" style="top: 0px; left: -2000px; opacity: 0; filter:alpha(opacity: 0); margin: 0px;position: relative;cursor:pointer">'+
              '</div>'
      $(this.handler).html(_html)
      this.edit_tools = $(this.handler).find('#edit-tools');
      $(this.handler).find('img').on('dragstart', function(event) { event.preventDefault(); });
      this.holder = $(this.handler).find('#holder')[0];
      this.aholder = $(this.handler).find('#holder a')[0];
      this.preview = $(this.handler).find('#preview')[0];
      this.raw_image = null;
      this.filename_image = null;
      //aholder.ondragover = function () { this.className = 'hover'; return false; };
      //aholder.ondragend = function () { this.className = ''; return false; };
      $(this.handler).find('#delete').on('click',this.deleteEvent);
      $(this.handler).find('#zoom-in').on('click',this.zoomInEvent);
      $(this.handler).find('#zoom-out').on('click',this.zoomOutEvent);
      $(this.handler).find('#rotate-right').on('click',this.rotateRightEvent);
      $(this.handler).find('#submit').on('click',this.completeEvent);
      this.aholder.ondrop = this.showImage;
      if(typeof FileReader == 'undefined'){
        $(this.handler).find('#'+this.filenameid).fileupload({
          //replaceFileInput: false,
          url: this.url,
          dataType: 'json',
          autoUpload: true,
          add: this.addEvent,
          done: this.doneEvent,
        })
      }else{
        $(this.handler).find('#'+this.filenameid).bind('change', this.showImage)
      }
      $(this.handler).css({
        'width': this.maxWidth+'px',
        'height': this.maxHeight+'px'
      });
    }
    maxupload.prototype.addEvent = function (e,data){
      this.show_loading();
      data.submit()
    }
    maxupload.prototype.doneEvent = function (e,data){
      if(typeof data.result.url != 'undefined'){
        window.location.href = data.result.url;
      }
      if(typeof data.result.full_path != 'undefined'){
        this.imagetemp = new Image();
        this.imagetemp.src = data.result.full_path;
        this._data = data;
        this.imagetemp.onload = this.imgLoad;
      }
      uploading = false
    }
    maxupload.prototype.imgLoad = function(){
      $(this.preview).css({
        'margin-top': '0px',
        'margin-left': '0px'
      });
      $(this.preview).css('width', '')
      $(this.preview).css('height', '')
      this.preview.src = this._data.result.full_path;
      this.filename_image = this._data.result.filename;
      if(this.imagetemp.width<this.imagetemp.height){
        _height =  this.imagetemp.height/this.imagetemp.width * this.maxHeight;
        if(_height<this.maxHeight){
          this.preview.height = this.maxHeight;
          _width =  this.imagetemp.width/this.imagetemp.height * this.maxWidth;
          this.preview.width = _width;
        }else{
          this.preview.height = _height;
          this.preview.width = this.maxWidth;
        }
        $(this.preview).css({
          //width: max,
          //height: _height,
          left: 0,
          top: (_height-this.maxHeight)/2*-1
        }).show();
      }else{
        _width =  this.imagetemp.width/this.imagetemp.height * this.maxWidth;
        this.preview.height = this.maxHeight;
        this.preview.width = _width;
        $(this.preview).css({
          //width: _width,
          //height: max,
          top: 0,
          left: (_width-this.maxWidth)/2*-1
        }).show();
      }
      this.show_edit_tools($(this.holder))
      this.adjust_img( $(this.preview))
      $(this.holder).trigger('mouseenter')
      $(this.handler).find('#warp_filename').hide();
      this.hide_loading();
      this.rotate = 0;
      $(this.preview).css({
        'transform': 'rotate('+this.rotate+'deg)',
      })
      this.ready && this.ready.call(this);
    }
    maxupload.prototype.preReadLoad = function(event){
      this._data = event;
      this.imagetemp = new Image();
      this.imagetemp.onload = this.readLoad;
      this.imagetemp.src = event.target.result;
    }
    maxupload.prototype.readLoad = function(){
       $(this.preview).css({
          'margin-top': '0px',
          'margin-left': '0px'
        });
        $(this.preview).css('width', '')
        $(this.preview).css('height', '')
        this.preview.src = this._data.target.result;
        raw_image = this._data.target.result;
        if(this.imagetemp.width<this.imagetemp.height){
          //_height =  this.imagetemp.height/this.imagetemp.width * this.maxHeight;
          _height =  this.maxWidth/this.imagetemp.width*this.imagetemp.height;
          if(_height<this.maxHeight){
            this.preview.height = this.maxHeight;
            _width =  this.maxHeight/this.imagetemp.height*this.imagetemp.width;
            this.preview.width = _width;
            $(this.preview).css({
              //width: _width,
              //height: max,
              top: 0,
              left: (_width-this.maxWidth)/2*-1
            }).show();
          }else{
            this.preview.height = _height;
            this.preview.width = this.maxWidth;
            $(this.preview).css({
              //width: max,
              //height: _height,
              left: 0,
              top: (_height-this.maxHeight)/2*-1
            }).show();
          }
        }else{
          //_width =  this.imagetemp.width/this.imagetemp.height * this.maxWidth
          _width =  this.maxHeight/this.imagetemp.height*this.imagetemp.width;
          if(_width<this.maxWidth){
            this.preview.width = this.maxWidth;
            _height =  this.maxWidth/this.imagetemp.width*this.imagetemp.height;
            this.preview.height = _height;
            $(this.preview).css({
              //width: max,
              //height: _height,
              left: 0,
              top: (_height-this.maxHeight)/2*-1
            }).show();
          }else{
            this.preview.height = this.maxHeight;
            this.preview.width = _width;
            $(this.preview).css({
              //width: _width,
              //height: max,
              top: 0,
              left: (_width-this.maxWidth)/2*-1
            }).show();
          }
        }
        this.show_edit_tools($(this.holder))
        this.adjust_img( $(this.preview))
        $(this.holder).trigger('mouseenter')
        $(this.handler).find('#warp_filename').hide();
        this.hide_loading();
        this.rotate = 0;
        $(this.preview).css({
          'transform': 'rotate('+this.rotate+'deg)',
        })
        this.ready && this.ready.call(this);
    }
    maxupload.prototype.showImage = function(input){
      this.className = '';
      //e.preventDefault();
      e = input
      var dt = e.dataTransfer || (e.originalEvent && e.originalEvent.dataTransfer);
      var file = e.target.files || (dt && dt.files);
      //file = false
      if (file) {
        // $(this.handler).show()
        reader = new FileReader();
        reader.onload = this.preReadLoad;
        reader.readAsDataURL(file[0]);
      }
    }
    maxupload.prototype.deleteEvent = function(){
      $(this.holder).off('mouseenter').off('mouseleave').off('touchstart').off('touchend')
      $(this.preview).attr('src','')
      $(this.preview).css('width', '0px')
      $(this.preview).css('height', '0px')
      $(this.handler).find('#'+this.filenameid).val('')
      $(this.handler).find('#warp_filename').show()
      $(this.edit_tools).hide()
      this.raw_image = null;
      this.filename_image = null;
      this.delete && this.delete.call(this);
    }
    maxupload.prototype.zoomInEvent = function(){
      ctx = $(this.holder)
      ctx_size = [parseFloat(ctx.width()),parseFloat(ctx.height())]
      img_size = [parseFloat($(this.preview).width()),parseFloat($(this.preview).height())]
      this.zoom = {};
      this.zoom.w = img_size[0]+(img_size[0]*5/100);
      this.zoom.h = img_size[1]+(img_size[1]*5/100);
      this.preview.height = this.zoom.h;
      this.preview.width = this.zoom.w;
      this.updateInfo()
    }
    maxupload.prototype.zoomOutEvent = function(){
      ctx = $(this.holder)
      ctx_size = [parseFloat(ctx.width()),parseFloat(ctx.height())]
      img_size = [parseFloat($(this.preview).width()),parseFloat($(this.preview).height())]
      this.zoom = {};
      this.zoom.w = img_size[0]-(img_size[0]*5/100);
      this.zoom.h = img_size[1]-(img_size[1]*5/100);
      if(this.zoom.w > ctx_size[0] && this.zoom.h > ctx_size[1]){
        this.preview.height = this.zoom.h;
        this.preview.width = this.zoom.w;
        _left = parseFloat($(this.preview).css('left'));
        _top = parseFloat($(this.preview).css('top'))
        _width = this.zoom.w-ctx_size[0];
        _height = this.zoom.h-ctx_size[1];
        $(this.preview).css({
          'left': _left > 0 ? 0 : _left < _width*-1 ? _width*-1 : _left,
          'top': _top > 0 ? 0 : _top < _height*-1 ? _height*-1 : _top
        })
        this.updateInfo()
      }
    }
    maxupload.prototype.rotateRightEvent = function(){
      ctx = $(this.holder)
      ctx_size = [parseFloat(ctx.width()),parseFloat(ctx.height())]
      img_size = [parseFloat($(this.preview).width()),parseFloat($(this.preview).height())]
      this.rotate += 90;
      
      if (this.rotate > 270) {
        this.rotate = 0;
      }
      $(this.preview).css({
        'transform': 'rotate('+this.rotate+'deg)',
        'margin-top': '0px',
        'margin-left': '0px'
      });

      if (this.rotate==90 || this.rotate==270) {
        $(this.preview).css('width', '')
        $(this.preview).css('height', '')
        if(this.imagetemp.width<this.imagetemp.height){
          console.log('masuk 1');
          _height =  this.imagetemp.height/this.imagetemp.width * this.maxHeight;
          if(_height<this.maxHeight){
            this.preview.height = this.maxHeight;
            _width =  this.imagetemp.width/this.imagetemp.height * this.maxWidth;
            this.preview.width = _width;
          }else{
            this.preview.height = _height;
            this.preview.width = this.maxWidth;
          }
          $(this.preview).css({
            //width: max,
            //height: _height,
            left: 0,
            top: (_height-this.maxHeight)/2*-1
          }).show();
        }else{
          console.log('masuk 2');
          _width =  this.imagetemp.width/this.imagetemp.height * this.maxWidth;
          this.preview.height = this.imagetemp.width;
          this.preview.width = _width;
          $(this.preview).css({
            //width: _width,
            //height: max,
            top: 0,
            left: (_width-this.maxWidth)/2*-1
          }).show();
        }
      }

      this.updateInfo()
    }
    maxupload.prototype.show_loading = function(){
      if(is_loading)return;
      is_loading = true;
    }
    maxupload.prototype.hide_loading = function(){
      is_loading = false;
    }
    maxupload.prototype.startEvent = function(){
      if(this.time_fade)clearTimeout(this.time_fade);
      this.edit_tools.show();
      this._element.find('#left-tools').stop().css({
        'left':'-72px',
        'top':'0px'
      }).animate({
        left:'0px'
      },200);
      this._element.find('#top-tools').stop().css({
        'right':'0px',
        'top':'-40px'
      }).animate({
        top:'0px'
      },200);
      this._element.find('#bot-tools').stop().css({
        'bottom':'-40px'
      }).animate({
        'bottom':'0px'
      },200);
    }
    maxupload.prototype.timeoutEndEvent = function(){
      this._element.find('#left-tools').animate({
        'left':'-72px',
      },200);
      this._element.find('#top-tools').animate({
        'top':'-40px'
      },200);
      this._element.find('#bot-tools').animate({
        'bottom':'-40px'
      },200);
    }
    maxupload.prototype.endEvent = function(){
      this.time_fade = setTimeout(this.timeoutEndEvent,1000)
    }
    maxupload.prototype.show_edit_tools = function(element){
      this._element = $(element);
      $(this._element).on({
        'mouseenter' : this.startEvent,
        'touchstart' : this.startEvent,
        'touchend' : this.endEvent,
        'mouseleave' : this.endEvent
      })
      _info = this._element.find('#bot-tools')
      _preview = $(this.preview)
      _info.find('input').on('change',function(){
        switch($(this).attr('id')){
          case 'x':
            _preview.css('left',parseFloat($(this).val())+"px")
            break;
          case 'y':
            _preview.css('top',parseFloat($(this).val())+"px")
            break;
          case 'w':
            _preview.width(parseFloat($(this).val()))
            break;
          case 'h':
            _preview.height(parseFloat($(this).val()))
            break;
        }
      }).on('click',function(){
        this.setSelectionRange(0, this.value.length)
      })
      this.updateInfo()
    }
    maxupload.prototype.mouseStartEvent = function(event){
      this.start_pos = [event.pageX,event.pageY];
      this.element_pos = [parseFloat($(this.__element).css('left')),parseFloat($(this.__element).css('top'))]
      this.draging = true;
    }
    maxupload.prototype.touchStartEvent = function(event){
      event.preventDefault();
      touch = event.originalEvent.touches[0] || event.originalEvent.changedTouches[0];
      this.start_pos = [touch.pageX,touch.pageY];
      this.element_pos = [parseFloat($(this.__element).css('left')),parseFloat($(this.__element).css('top'))]
      this.draging = true;
    }
    maxupload.prototype.mouseMoveEvent = function(event){
      if(this.draging){
        this.end_pos = [event.pageX,event.pageY];
        if(this.end_pos[0]-this.start_pos[0]>50 || this.end_pos[0]-this.start_pos[0]<50){
          _left = this.element_pos[0]+this.end_pos[0]-this.start_pos[0];
          _top = this.element_pos[1]+this.end_pos[1]-this.start_pos[1];
          _width = parseFloat($(this.__element).width())-parseFloat($(this.holder).width());
          _height = parseFloat($(this.__element).height())-parseFloat($(this.holder).height());
          this.__element.css({
            'left': _left > 0 ? 0 : _left < _width*-1 ? _width*-1 : _left,
            'top': _top > 0 ? 0 : _top < _height*-1 ? _height*-1 : _top
          })
        }
        this.updateInfo()

        // _result = $(this.preview);
        // console.log(_result.css('left')+";"+_result.css('top')+";"+_result.css('width')+";"+_result.css('height')+";"+this.rotate+"deg");
      }
    }
    maxupload.prototype.touchMoveEvent = function(event){
      if(this.draging){
        touch = event.originalEvent.touches[0] || event.originalEvent.changedTouches[0];
        this.end_pos = [touch.pageX,touch.pageY];
        if(this.end_pos[0]-this.start_pos[0]>50 || this.end_pos[0]-this.start_pos[0]<50){
          _left = this.element_pos[0]+this.end_pos[0]-this.start_pos[0];
          _top = this.element_pos[1]+this.end_pos[1]-this.start_pos[1];
          _width = parseFloat($(this.__element).width())-parseFloat($(this.holder).width());
          _height = parseFloat($(this.__element).height())-parseFloat($(this.holder).height());
          this.__element.css({
            'left': _left > 0 ? 0 : _left < _width*-1 ? _width*-1 : _left,
            'top': _top > 0 ? 0 : _top < _height*-1 ? _height*-1 : _top
          })
        }
        this.updateInfo()
      }
    }
    maxupload.prototype.endDragingEvent = function(){
      this.draging = false;
    }
    maxupload.prototype.adjust_img = function(element){
      this.draging = false;
      this.__element = $(element);
      $(this.__element).on({
        'mousedown' : this.mouseStartEvent,
        'touchstart' : this.touchStartEvent,
        'mousemove' : this.mouseMoveEvent,
        'touchmove' : this.touchMoveEvent,
        'mouseup' : this.endDragingEvent,
        'touchend' : this.endDragingEvent,
        'mouseleave' : this.endDragingEvent
      })
    }
    maxupload.prototype.completeEvent = function(element){
      _result = $(this.preview)
      this.complete && this.complete.call( this, {x:_result.css('left'),y:_result.css('top'),w:_result.css('width'),h:_result.css('height'),t:this.rotate+'deg'});
    }
    maxupload.prototype.updateInfo = function(){
      if (_info){ 
        _info.find('#x').val(parseFloat($(this.preview).css('left')))
        _info.find('#y').val(parseFloat($(this.preview).css('top')))
        _info.find('#w').val(parseFloat($(this.preview).css('width')))
        _info.find('#h').val(parseFloat($(this.preview).css('height')))
      }
    }
    return maxupload;
  })();

  $.fn.maxupload = function(options){
    if (!this.imgloadInstance) {
      this.imgloadInstance = new maxupload(this, options || {});
    } else {
      this.imgloadInstance.update(options || {});
    }
    this.imgloadInstance();
    return this;
  }
})(jQuery);