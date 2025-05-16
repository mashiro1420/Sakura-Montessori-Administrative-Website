<?php

namespace App\Http\Controllers;

use App\Exports\TaiKhoanExport;
use App\Http\Controllers\Controller;
use App\Models\PhanQuyenModel;
use App\Models\QuyenModel;
use App\Models\TaiKhoanModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
class TaiKhoanController extends Controller
{

    public function viewQuanLy(Request $request)
    {
        $query = DB::table('ql_taikhoan as tk')
            ->select(
                'tk.tai_khoan',
                'tk.id_hoc_sinh',
                'tk.id_nhan_vien',
                DB::raw('GROUP_CONCAT(pq.id_quyen) as quyen_ids')
            )
            ->leftJoin('ql_phanquyen as pq', 'tk.tai_khoan', '=', 'pq.id_tai_khoan')
            ->groupBy('tk.tai_khoan', 'tk.id_hoc_sinh', 'tk.id_nhan_vien');

        // Lọc theo các điều kiện tìm kiếm
        if ($request->filled('tk_tai_khoan')) {
            $query->where('tk.tai_khoan', 'like', '%' . $request->tk_tai_khoan . '%');
        }
        if ($request->filled('tk_quyen')) {
            $query->where('pq.id_quyen', '=', $request->tk_quyen);
        }
        if ($request->filled('tk_ma_hoc_sinh')) {
            $query->where('tk.id_hoc_sinh', 'like', '%' . $request->tk_ma_hoc_sinh . '%');
        }
        if ($request->filled('tk_nhan_vien')) {
            $query->where('tk.id_nhan_vien', 'like', '%' . $request->tk_nhan_vien . '%');
        }

        $data['tai_khoans'] = $query->get();
        $data['quyens'] = DB::table('dm_quyen')->get(); // hoặc dùng QuyenModel::all();

        // Giữ lại input lọc để đổ lại form
        $data['tk_tai_khoan'] = $request->tk_tai_khoan;
        $data['tk_quyen'] = $request->tk_quyen;
        $data['tk_ma_hoc_sinh'] = $request->tk_ma_hoc_sinh;
        $data['tk_nhan_vien'] = $request->tk_nhan_vien;

        return view('Quan_ly_tai_khoan.quan_ly_tai_khoan', $data);
    }
    public function viewCaiDat(Request $request)
    {
        $data=[];
        return view('Quan_ly_tai_khoan.cai_dat_tai_khoan',$data);
    }
//---------------------------------------
    public function xlDoiMK(Request $request){
        $tai_khoan = TaiKhoanModel::find($request->tai_khoan);
        if($tai_khoan->mat_khau != md5($request->mat_khau_cu)){
            session()->flash('bao_loi', 'Mật khẩu không đúng');
            return redirect()->route('cai_dat_tk');
        }
        if($request->mat_khau_moi != $request->xac_nhan){
            session()->flash('bao_loi', 'Mật khẩu xác nhận không giống với mật khẩu mới');
            return redirect()->route('cai_dat_tk');
        }
        $tai_khoan->mat_khau = md5($request->mat_khau_moi);
        $tai_khoan->save();
        session()->flash('bao_loi', 'Cập nhật mật khẩu thành công');
        return redirect()->route('cai_dat_tk');
        
    }
    public function xlPhanQuyen(Request $request){
        $phan_quyens = PhanQuyenModel::where('id_tai_khoan','=',$request->tai_khoan)->get();
        foreach($phan_quyens as $phan_quyen){
            $phan_quyen->delete();
        }
        foreach($request->quyen as $quyen){
            $phan_quyen = new PhanQuyenModel();
            $phan_quyen->id_tai_khoan = $request->tai_khoan;
            $phan_quyen->id_quyen = $quyen;
            $phan_quyen->save();
        }
        session()->flash('bao_loi', 'Cập nhật quyền thành công');
        return redirect()->route('ql_tk');
    }

    public function export(Request $request){
        $query = TaiKhoanModel::query()->select ('*')
        ->leftJoin('dm_quyen','ql_taikhoan.id_quyen','=','dm_quyen.id');
        $query = $query->get();
        return Excel::download(new TaiKhoanExport($query), 'export_tk.xlsx');
    }
    public function viewBaoCao(Request $request){
        $data=[];
        return view('Thong_ke_bao_cao.thong_ke_bao_cao', $data);
    }
}
