<div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title text-white">Update Data Siwa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form wire:submit.prevent="dataUpdate" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $name }}" disabled required>
                    @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kelas</label>
                  <input wire:model="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror" placeholder="Kelas" autofocus required>
                    @error('kelas')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jurusan</label>
                  <input wire:model="jurusan" type="text" class="form-control @error('jurusan') is-invalid @enderror" placeholder="Jurusan" autofocus required>
                    @error('jurusan')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <label class="label">{{ $jurusan . " Berapa" }}</label><br>
                <div class="form-floating">
                    <select class="form-select" wire:model="jurusan_berapa" id="floatingSelect" aria-label="Floating label select example">
                      <option disabled="disabled" selected="selected">{{ $jurusan . " Berapa" }}</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                    </select>
                    @error('jurusan_berapa')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a wire:click="hidden()" class="btn btn-secondary">Hidden</a>
              </div>
            </form>
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div>
