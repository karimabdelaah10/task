@push('css')
    <style>
        output > span > img {
            border-radius: 50% !important;
        }
    </style>
@endpush
<div class="{{@$attributes['col_class']}}  col-12">
    <div class="mb-1">
        <label for="{{@$attributes['id']}}" class="form-label">
            {{ @$attributes['label'] }}
            <span
                class="{{ (@$attributes['required'])?'required':'' }} text-danger">{{ (@$attributes['required'])?'*':'' }} {{ (@$attributes['stared'])?'*':'' }}</span>
        </label>
        {!! Form::file($name,$attributes)!!}
        <small class="text-muted">{{ @$attributes['help'] }}</small>
        <br>
        <output id="listImage" class="listImage">
            @if(isset($value))
                @if(@$attributes['file_type'] == 'attachment' )
                    {!! viewFile($value) !!}
                @else
                    {!! viewInputImage($value,'small') !!}
                @endif
            @endif
        </output>

    </div>
</div>



@push('js')
    <script>
        function handleFileSelect(evt) {
            var files = evt.target.files;

            // Loop through the FileList and render image files as thumbnails.
            for (var i = 0, f; f = files[i]; i++) {

                // Only process image files.
                if (!f.type.match('image.*')) {
                    continue;
                }

                var reader = new FileReader();

                // Closure to capture the file information.
                reader.onload = (function (theFile) {
                    return function (e) {
                        // Render thumbnail.
                        var span = document.createElement('span');
                        span.innerHTML =
                            [
                                '<img style="height: 300px; width:300px; border: 1px solid #000; margin: 5px" src="',
                                e.target.result,
                                '" title="', escape(theFile.name),
                                '"/>'
                            ].join('');
                        $('.listImage img').remove();
                        document.getElementById('listImage').insertBefore(span, null);
                    };
                })(f);

                // Read in the image file as a data URL.
                reader.readAsDataURL(f);
            }
        }

        document.getElementById('{{ $name }}').addEventListener('change', handleFileSelect, false);
    </script>
@endpush
