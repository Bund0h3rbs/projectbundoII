<h5 >Role Akses Menu</h5><hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped"  id="table_akses">
            <thead class="bg-primary">
                <tr>
                    <th width="30px" >No</th>
                    <th >Akses</th>
                    <th width="100px" >Views</th>
                    <th width="100px" >Create</th>
                    <th width="100px" >Update</th>
                    <th width="100px" >Delete</th>
                </tr>
            </thead>
            <tbody>
            @if(count($menus) < 0 )
                <tr>
                 <td colspan="6" align="center"> <span class="text-danger"> Data Tidak Ditemukan Harap Tambahkan Akses Terlebih Dahulu</span></td>
                </tr>
            @else
            @php($i = 0)
            @foreach($menus as $mn_id => $value)
            <?php
                $role = \App\Models\Menus_rolemenus::where(['menus_id'=> $value->id ,'akses_id'=>$akses])->first();

                if($value->active == 1){
                    $bg_color="<span class='badge badge-primary'> Publish</span>";
                }else{
                    $bg_color="<span class='badge badge-danger'> Draf</span>";
                }

            ?>
                <tr >
                 <td >{{++$i}}</td>
                 <td ><strong >{{ $value->name }} </strong> {!! $bg_color !!}
                 </td>
                 <td align="center"><div class="icheck-primary d-inline">
                        <input type="checkbox" name="views[]" id="checkViews_{{$i}}" value="{{$value->id}}"
                        <?php if(!empty($role->views) and $role->views=='1'){ echo "checked";} ?>>
                        <label for="checkViews_{{$i}}">
                        </label>
                      </div></td>
                 <td align="center"><div class="icheck-primary d-inline">
                        <input type="checkbox" name="creator[]" id="checkCreate_{{$i}}"
                        <?php if(!empty($role->creator) and $role->creator=='1'){ echo "checked";} ?> >
                        <label for="checkCreate_{{$i}}">
                        </label>
                      </div>
                 </td>
                 <td align="center"><div class="icheck-primary d-inline">
                        <input type="checkbox" name="updater[]" id="checkUpdate_{{$i}}"
                        <?php if(!empty($role->updater) and $role->updater=='1'){ echo "checked";} ?>>
                        <label for="checkUpdate_{{$i}}">
                        </label>
                      </div>
                 </td>
                 <td align="center"><div class="icheck-primary d-inline">
                        <input type="checkbox" name="deleted[]" id="checkDelete_{{$i}}"
                        <?php if(!empty($role->deleted) and $role->deleted=='1'){ echo "checked";} ?>>
                        <label for="checkDelete_{{$i}}">
                        </label>
                      </div>
                 </td>
                </tr>
        @endforeach
        @endif
        </tbody>
    </table>
</div>
