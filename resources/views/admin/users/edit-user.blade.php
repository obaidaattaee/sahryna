@extends('admin.layouts.app')
@section('css')
<style>
    body {
  font-family: sans-serif;
}
a {
  color: #369;
}
.note {
  width: 500px;
  margin: 50px auto;
  font-size: 1.1em;
  color: #333;
  text-align: justify;
}
#drop-area {
  border: 2px dashed #ccc;
  border-radius: 20px;
  width: 480px;
  margin: 50px auto;
  padding: 20px;
}
#drop-area.highlight {
  border-color: purple;
}
p {
  margin-top: 0;
}
.my-form {
  margin-bottom: 10px;
}
#gallery {
  margin-top: 10px;
}
#gallery img {
  width: 150px;
  margin-bottom: 10px;
  margin-right: 10px;
  vertical-align: middle;
}
.button {
  display: inline-block;
  padding: 10px;
  background: #ccc;
  cursor: pointer;
  border-radius: 5px;
  border: 1px solid #ccc;
}
.button:hover {
  background: #ddd;
}
#fileElem {
  display: none;
}
</style>
@endsection
@section('content')
{{-- {{ dd($role) }} --}}
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase">المستخدمين / التعديل الملف الشخصي</span>
                </div>

            </div>
            <div class="portlet-body form">
                <form role="form" enctype="multipart/form-data" action="{{ route('users.update' , ['user' => $user->id])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <input type="text" class="form-control" required name="first_name" value="{{ old('first_name') ?? $user->first_name ?? '' }}" id="form_control_1" placeholder="الاسم الاول">
                                    <label for="form_control_1">الاسم الاول</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <input type="text" class="form-control" required name="last_name" value="{{ old('last_name') ?? $user->last_name ?? '' }}" id="form_control_1" placeholder="اسمالاسم الاخير ">
                                    <label for="form_control_1">الاسم الاخير</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <input type="email" class="form-control" disabled name="email" value="{{ old('email') ?? $user->email ?? '' }}" id="form_control_1" placeholder="البريد الالكتروني ">
                            <label for="form_control_1">البريد الالكتروني</label>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone') ?? $user->phone ?? '' }}" id="form_control_1" placeholder="رقم الهاتف">
                                    <label for="form_control_1">رقم الهاتف</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <input type="text" class="form-control" name="person_id" value="{{ old('person_id') ?? $user->person_id ?? '' }}" id="form_control_1" placeholder="الرقم الوطني">
                                    <label for="form_control_1">الرقم الوطني</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <input type="password" class="form-control" name="password"  id="form_control_1" placeholder="كلمة المرور ">
                                    <label for="form_control_1"> كلمة المرور الجديدة </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <input type="password" class="form-control" name="password_confirmation"  id="form_control_1" placeholder="تاكيد كلمة المرور الجديدة ">
                                    <label for="form_control_1">تاكيد كلمة المرور الجديدة </label>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="dropzone dz-clickable" id="my-dropzone" >
                        <div id="drop-area">

                              <p>صورة المستخدم</p>
                              <input type="file" name="file" id="fileElem" multiple accept="image/*" onchange="handleFiles(this.files)">
                              <label class="button" for="fileElem">Select some files</label>
                            <progress id="progress-bar" max=100 value=0></progress>
                            <div id="gallery" /></div>
                          </div>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue">حفظ </button>
                        <a href="{{ route('users.index') }}"  class="btn default">الغاء</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
        <!-- BEGIN SAMPLE FORM PORTLET-->

        <!-- END SAMPLE FORM PORTLET-->
        <!-- BEGIN SAMPLE FORM PORTLET-->

        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
@endsection
@section('js')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script type="text/javascript">
// ************************ Drag and drop ***************** //
let dropArea = document.getElementById("drop-area")

// Prevent default drag behaviors
;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, preventDefaults, false)
  document.body.addEventListener(eventName, preventDefaults, false)
})

// Highlight drop area when item is dragged over it
;['dragenter', 'dragover'].forEach(eventName => {
  dropArea.addEventListener(eventName, highlight, false)
})

;['dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, unhighlight, false)
})

// Handle dropped files
dropArea.addEventListener('drop', handleDrop, false)

function preventDefaults (e) {
  e.preventDefault()
  e.stopPropagation()
}

function highlight(e) {
  dropArea.classList.add('highlight')
}

function unhighlight(e) {
  dropArea.classList.remove('active')
}

function handleDrop(e) {
  var dt = e.dataTransfer
  var files = dt.files

  handleFiles(files)
}

let uploadProgress = []
let progressBar = document.getElementById('progress-bar')

function initializeProgress(numFiles) {
  progressBar.value = 0
  uploadProgress = []

  for(let i = numFiles; i > 0; i--) {
    uploadProgress.push(0)
  }
}

function updateProgress(fileNumber, percent) {
  uploadProgress[fileNumber] = percent
  let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length
  console.debug('update', fileNumber, percent, total)
  progressBar.value = total
}

function handleFiles(files) {
  files = [...files]
  initializeProgress(files.length)
  files.forEach(uploadFile)
  files.forEach(previewFile)
}

function previewFile(file) {
  let reader = new FileReader()
  reader.readAsDataURL(file)
  reader.onloadend = function() {
    let img = document.createElement('img')
    img.src = reader.result
    document.getElementById('gallery').appendChild(img)
  }
}

function uploadFile(file, i) {
  var url = 'https://api.cloudinary.com/v1_1/joezimim007/image/upload'
  var xhr = new XMLHttpRequest()
  var formData = new FormData()
  xhr.open('POST', url, true)
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')

  // Update progress (can be used to show progress indicator)
  xhr.upload.addEventListener("progress", function(e) {
    updateProgress(i, (e.loaded * 100.0 / e.total) || 100)
  })

  xhr.addEventListener('readystatechange', function(e) {
    if (xhr.readyState == 4 && xhr.status == 200) {
      updateProgress(i, 100) // <- Add this
    }
    else if (xhr.readyState == 4 && xhr.status != 200) {
      // Error. Inform the user
    }
  })

  formData.append('upload_preset', 'ujpu6gyk')
  formData.append('file', file)
  xhr.send(formData)
}
</script>


@endsection
