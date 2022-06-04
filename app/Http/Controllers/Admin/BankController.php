<?php

namespace App\Http\Controllers\Admin;
use App\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class BankController extends Controller
{
    public function getBanks(){
        $this->data['banks'] = Bank::all();
        return view('admin.banks.banks' , $this->data);
    }

    public function getAddBank(){
        return view('admin.banks.add');
    }

    public function postAddBank(Request $request){
        $this->validate($request,
            [

                'iban'    => 'required',
                'number'    => 'required',
                'name'    => 'required',
                'image'    => 'required',
            ],
            [
                'iban.required' => 'تاكد من ادخال رقم الايبان',
                'number.required' => 'تاكد من ادخال رقم الحساب',
                'image.required' => 'تاكد من ادخال صوره البنك',
                'name.required' => 'تاكد من ادخال اسم البنك',
            ]
        );

        $bank= new Bank();
        $bank->iban         =$request['iban'];
        $bank->number         =$request['number'];
        $bank->name        =$request['name'];
        $bank->bank_name        =$request['bank_name'];
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' .\request('image')->getClientOriginalExtension();
            $bank->image = 'banks/'.$imageName;
            $image->move('upload/banks', $imageName);
        }
        toastr()->success('تم الإضافة بنجاح','تم');

        $bank->save();



        return redirect(route('bank.index'));
    }


    public function deleteBank($id){
        $this->data['bank'] = Bank::find($id)->delete();
        return back();
    }

    public function getUpdateBank($id){
        $this->data['bank'] = Bank::find($id);
        return view('admin.banks.update' , $this->data);
    }

    public function postUpdateBank(Request $request , $id)
    {

        $bank = Bank::find($id);

        if($request->name){
            $bank->name =$request->name;
        }else{
            $bank->name = $bank->name;
        }

        if($request->iban){
            $bank->iban =$request->iban;
        }else{
            $bank->iban = $bank->iban;
        }

        if($request->number){
            $bank->number =$request->number;
        }else{
            $bank->number = $bank->number;
        }
        if($request->bank_name){
            $bank->bank_name =$request->bank_name;
        }else{
            $bank->bank_name = $bank->bank_name;
        }




        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' .\request('image')->getClientOriginalExtension();
            $bank->image = 'banks/'.$imageName;
            $image->move('upload/banks', $imageName);

        }

        $bank->update();


        toastr()->success('تم التعديل بنجاح','تم');

        return redirect(route('bank.index'));
    }
    public function delete(Request $request)
    {
        $good= Bank::destroy($request->id);
        if ($good)
            return response(['error'=>0]);
        else
            return response(['error'=>1]);

    }//end
    public function bulkDelete(Request $request)
    {

        $success = '';
        $error = '';
        $supportTickets_id_array = $request['id'];
        foreach ($supportTickets_id_array as $supportTicket_id) {
            $supportTicket = Bank::find($supportTicket_id);
            if ($supportTicket->delete()) {
                $success = 'تم حذف  الحسابات بنجاح.';
            } else {
                $error = 'حدث خطأ.';
                return response()->json(['success' => '', 'error' => $error]);
            }
        }
        return response()->json(['success' => $success, 'error' => '']);
    }

}
