<template>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $t('Chapter.Create') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label>{{ $t('Chapter.Name') }}</label>
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {};
</script>
