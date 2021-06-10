<div>
    <form {{ $attributes->merge(['action' => '']) }} method="POST">
        @csrf
        @method("DELETE")
        <!-- Delete -->
        <div class="modal fade" id="delete" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                <h5 class="modal-title" style="color: #000" id="staticBackdropLabel">حذف مقالة</h5>
                </div>
                <div class="modal-body border-0 text-right">
                هل أنت متاكد لحذف المقالة ؟
                </div>
                <div style="background-color: #f4f7fa" class="modal-footer border-0">
                <p style="color: #7e858d" class="btn" data-dismiss="modal">إلغاء</p>
                <button type="submit"  style="background-color: #d6514b;color:#fff" class="btn shadow-sm">حذف</button>
                </div>
            </div>
            </div>
        </div>
    </form>
    </div>