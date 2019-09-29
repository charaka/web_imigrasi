  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('judul_in', 'Judul In*') !!}
          {!! Form::text('judul_in', null, ['class' => 'form-control', 'placeholder' => 'Judul In','id'=>'judul_in','required'=>'required']) !!}
        </div>
      </div>
      <div class="col-md-3">
        {!! Form::label('id_kategori', 'Kategori*') !!}
        <select class="form-control select2" id="id_kategori" name="id_kategori">
          {!! $parents !!}
        </select>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          {!! Form::label('tanggal_publish', 'Tanggal Publish*') !!}
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            {!! Form::text('tanggal_publish', date('d/m/Y'), ['class' => 'form-control pull-right datepicker_input required', 'placeholder' => 'Tanggal Publish','id'=>'created_at']) !!}
          </div>
        </div>
      </div>  
      <div class="col-md-12">
        <div class="form-group">
          {!! Form::label('konten_in', 'Konten In*') !!}
          {!! Form::textarea('konten_in', null, ['class' => 'form-control required summernote', 'placeholder' => 'Konten In','id'=>'konten_in', 'style' => 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          {!! Form::label('judul_en', 'Judul En*') !!}
          {!! Form::text('judul_en', null, ['class' => 'form-control required', 'placeholder' => 'Judul En','id'=>'judul_en','required'=>'required']) !!}
        </div>
      </div>  
      <div class="col-md-12">
        <div class="form-group">
        {!! Form::label('konten_en', 'Konten En*') !!}
        {!! Form::textarea('konten_en', null, ['class' => 'form-control required summernote', 'placeholder' => 'Konten In','id'=>'konten_en', 'style' => 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}
        </div>
      </div>      
    </div>
    
  </div>
  <!-- /.box-body -->


  <div class="box-footer">
    <div class="box-comment">
      <div class="row">
        <div class="col-md-12">
          @if(!empty($file))
          @if(count($file)>0)
          {!! Form::label('Lampiran', 'Lampiran*') !!}
          <table class="table table-striped table-bordered table-hover table-condensed">
            <thead>
              <tr>
                <th>File</th>
                <th>Deskripsi</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($file as $fLampiran)
              <tr>
                <td>
                  @if($fLampiran->file)
                  <a href="{{ url($fLampiran->file) }}" target="_blank"><i class="fa fa-cloud-download"></i> Download</a>
                  @else
                  No File
                  @endif
                </td>
                <td>{{ $fLampiran->deskripsi }}</td>
                <td><a href="javascript:;" onclick="del_file({{ $fLampiran->id }})"><i class="fa fa-times"></i></a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @endif
          @else
           
          @endif
        </div>
      </div>
      <div class="row">
        <div class="main_tmp">
          <div class="form-group">
            <div class="col-md-3">
              {!! Form::label('file_lampiran_', 'File Lampiran') !!}
              {!! Form::file('file_lampiran[]', ['id'=>'file_lampiran1','class' => 'filex', 'placeholder' => 'File Lampiran']) !!}
            </div>
            <div class="col-md-9">
              {!! Form::label('deskripsi_file_', 'Deskripsi Lampiran') !!}
              {!! Form::text('deskripsi_file[]', NULL, ['id'=>'deskripsi_file1','class' => 'form-control', 'placeholder' => 'Deskripsi Lampiran']) !!}
            </div>
          </div>
        </div>
        <div class="hide" id="fileTemplate">
          <div class="form-group">
            <div class="col-md-3" style="margin-top: 10px">
              {!! Form::label('file_lampiran_', 'File Lampiran') !!}
              {{ Form::file('', ['class' => 'tmp_file_lampiran ']) }}
            </div>
            <div class="col-md-9" style="margin-top: 10px">
              <label>Deskripsi Lampiran <a href="javascript:;" class="removeButton" data-template="file" style="margin-left: 20px"><i class="fa fa-trash"></i></a></label> 
              {!! Form::text('', NULL, ['class' => 'form-control tmp_deskripsi_file', 'placeholder' => 'Deskripsi Lampiran']) !!}
            </div>
          </div>
        </div>  
      </div>
      <div class="row" style="margin-top: 10px">
        <div class="form-group">
          <div class="col-md-12" >
            <button class="btn btn-xs btn-primary pull-right btn-flat" type="button" id="btn_file" class="btn_file" data-template="file">Tambah File</button>
          </div>
        </div>
      </div>
      
    </div>
  </div>

  <div class="box-footer">
    <div class="box-comment">
      <div class="row">
        <div class="col-md-12">
          @if(!empty($videos))
            @if(count($videos)>0)
              @foreach($videos as $video)
                  @if($video->file)
                  <div class="col-md-4">
                    <a href="{{ url($video->file) }}" rel="facebox">
                      <div>
                      <div class="pull-right">
                        <a href="javascript:;" onclick="del_file({{ $video->id }})"><i class="fa fa-times"></i></a>
                      </div>
                        <div class="col-md-3" style="padding: 0"><iframe width="310" height="213" src="https://www.youtube.com/embed/{!! $video->file !!}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
                      </div>
                    </a>
                  </div>
                  @else
                  No File
                  @endif
              @endforeach 
            @endif
          @else

          @endif
        </div>
      </div>
      <div class="row">
        <div class="main_tmp">
          <div class="form-group">
            <div class="col-md-12">
              {!! Form::label('deskripsi_video_', 'URL video') !!}
              {!! Form::text('deskripsi_video[]', NULL, ['id'=>'deskripsi_video1','class' => 'form-control', 'placeholder' => 'Deskripsi video']) !!}
            </div>
          </div>
        </div>
        <div class="hide" id="videoTemplate">
          <div class="form-group">
            <div class="col-md-12" style="margin-top: 10px">
              <label>URL video <a href="javascript:;" class="removeButton" data-template="video" style="margin-left: 20px"><i class="fa fa-trash"></i></a></label> 
              {!! Form::text('', NULL, ['class' => 'form-control tmp_deskripsi_video', 'placeholder' => 'URL video']) !!}
            </div>
          </div>
        </div>  
      </div>
      <div class="row" style="margin-top: 10px">
        <div class="form-group">
          <div class="col-md-12" >
            <button class="btn btn-xs btn-primary pull-right btn-flat" type="button" id="btn_video" class="btn_video" data-template="video">Tambah video</button>
          </div>
        </div>
      </div>
      
    </div>
  </div>