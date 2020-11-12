<section class="top_innerpage">
   <div class="container-custom">
      <div class="ti-content ">
         <div class="title-ti pt15 fnt-bld txt-upp">
            Premium Calculator
         </div>
         <div class="breadcrums mtsmall">
            <ol class="list-unstyled list-inline">
               <li class="list-inline-item breadcrumb-item"><a href="#">Home</a></li>
               <li class="list-inline-item breadcrumb-item active" aria-current="page">Premium Calculator</li>
            </ol>
         </div>
      </div>
   </div>
</section>
<div class="content-section">
   <div class="container-custom">
      <div class="row mb-30 mt-30">
         <div class="col-lg-3">
            <div class="tab-menu">
               <ul>
                  <li><a href="#" class="s-btn s-active s-btn-block fnt-bld text-capitalize" data-id="thirdpartyinsurance">third party Insurance</a></li>
                 <li><a href="#" class="s-btn s-btn-block fnt-bld text-capitalize" data-id="motorcyclecomprehensive">Motor  Comprehensive </a></li>
                 <!--   <li><a href="#" class="s-btn s-btn-block fnt-bld text-capitalize" data-id="privatecarcomprehensive">Private Car Comprehensive</a></li>
                  <li><a href="#" class="s-btn s-btn-block fnt-bld text-capitalize" data-id="goodscarrying">Goods Carrying</a></li>
                  <li><a href="#" class="s-btn s-btn-block fnt-bld text-capitalize" data-id="passengercarrying">Passenger Carrying</a></li>
                  <li><a href="#" class="s-btn s-btn-block fnt-bld text-capitalize" data-id="taxicomprehensive">Taxi Comprehensive</a></li>
                  <li><a href="#" class="s-btn s-btn-block fnt-bld text-capitalize" data-id="tractorcomprehensive">Tractor Comprehensive</a></li>
                  <li><a href="#" class="s-btn s-btn-block fnt-bld text-capitalize" data-id="tab3">लघु बीमा (कृषि/पशु/पन्छी)</a></li>
                  <li><a href="#" class="s-btn s-btn-block fnt-bld text-capitalize" data-id="tab3">Travel Medical Insurance</a></li>
                  <li><a href="#" class="s-btn s-btn-block fnt-bld text-capitalize" data-id="tab3">House/Property Insurance</a></li> -->
               </ul>
            </div>
         </div>
         <div class="col-lg-9">
            <div class="tab-container">
               <!--end of tab-menu-->
               <div class="tab tab-active" data-id="thirdpartyinsurance">
                  <div class="section-header  mb-30 section-secon-color">
                     third party Insurance
                  </div>

                  <div class="clearfix"></div>

                  <div class="tab-content-area">
                     <div class="row">
                        <div class="col-lg-5">
                           <form class="form-horizontal " method="POST" id="form_pcalculator">
                           <div class="form-group">
                              <label for="">Motor Type</label>
                              <select name="pVehicleCategoryid" id="pVehicleCategoryid" class="form-control motor-type">
                                 <option value="">- Select Type -</option>
                                 <option value="1">Motorcycle </option>
                                 <option value="3">Truck/Pick-up </option>
                                 <option value="4">Bus </option>
                                 <option value="5">Tanker (Fuel) </option>
                                 <option value="6">Tempo </option>
                                 <option value="9">Taxi </option>
                                 <option value="11">Tractor </option>
                                 <option value="33">Electric Vehicle </option>
                                 <option value="34">Tanker (Water)</option>
                                 <option value="8">Private Car</option>
                                 <option value="36">Electric Vehicle(PV)</option>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="">Cubic Capacity (CC) [Eg.: 150]</label>
                              <input type="text" name="pCC_HP_SEATS" id="pCC_HP_SEATS" class="form-control cc">
                           </div>
                           <div class="row">
                              <div class="col-lg-6">
                                 	<div class="form-group">
		                              <label for="">Driver?</label>
		                              <select name="pNo_of_Driver" id="pNo_of_Driver" class="form-control pp" >
		                                 <option value="1">Yes</option>
		                                 <option value="0">No</option>
		                              </select>
		                           </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="">Passenger [Eg.: 3]</label>
                                    <input type="text" name="pNo_of_Passenger" id="pNo_of_Passenger" class="form-control pax">
                                 </div>
                              </div>
                           </div>
                            <div class="row">
                            	<div class="col-lg-6">
		                           <div class="form-group">
		                              <label for="">Helper?</label>
		                              <select name="pNo_of_Helper" id="pNo_of_Helper" class="form-control pp" >
		                                 <option value="1">Yes</option>
		                                 <option value="0">No</option>
		                              </select>
		                           </div>
	                       		</div>
                              <div class="col-lg-6">
		                           <div class="form-group">
		                              <label for="">Is Pool?</label>
		                              <select name="pExcludePool" id="pExcludePool" class="form-control pp" >
		                                 <option value="true">Yes</option>
		                                 <option value="false">No</option>
		                              </select>
		                           </div>
	                       		</div>
	                       	</div>
                           <div class="from-group">
                                 <!-- <button type="button" class="btn btn-primary submit_pcalculator">Submit</button> -->
                                <button type="button" class="btn btn-primary submit_pcalculator"><i class="fa fa-calculator"></i> Calculate</button>
                               
                           </div>
                        </form>

                        </div>





                        <div class="offset-lg-1 col-lg-6 result_div">
                                 <div class="section-title fnt-bld mb-15">
                                    <span class="vehicle_cat"></span>
                                 </div>
                                 <table class="table table-response table-striped table-sm">
                                    <tbody>
                                       <tr>
                                          <td>Total Premium</td>
                                          <td class="text-right TotalPremium"></td>
                                       </tr>
                                       <tr>
                                          <td>Stamp Duty</td>
                                          <td class="text-right StampDuty"></td>
                                       </tr>
                                       <tr>
                                          <td>Total Vatable</td>
                                          <td class="text-right TotalVatable"></td>
                                       </tr>
                                       <tr>
                                          <td>Tax</td>
                                          <td class="text-right Tax"></td>
                                       </tr>
                                       <tr>
                                          <td>Total Payable Prem</td>
                                          <td class="text-right TotalPayablePrem"></td>
                                       </tr>
                                      <!--  <tr>
                                          <td>VAT</td>
                                          <td class="text-right vat">NPR 821.6</td>
                                       </tr>
                                       <tr>
                                          <td>Total Amount</td>
                                          <td class="text-right">
                                             <h4 class="fnt-bld total_amount">NPR 7141.6</h4>
                                          </td>
                                       </tr> -->
                                    </tbody>
                                 </table>
                        </div>


                     </div>
                  </div>
               </div>
               <!--end of tab one-->







               <div class="tab " data-id="motorcyclecomprehensive">
                    <div class="section-header  mb-30 section-secon-color">
                     Motor  Comprehensive
                  </div>

                  <div class="clearfix"></div>

                  <div class="tab-content-area">
                     <div class="row">
                        <div class="col-lg-5">
                           <form class="form-horizontal " method="POST" id="form_pcalculator_c">
                           <div class="form-group">
                              <label for="">Motor Type</label>
                              <select name="pVehicleCategoryid_c" id="pVehicleCategoryid_c" class="form-control motor-type">
                                 <option value="">- Select Type -</option>
                                 <option value="1">Motorcycle </option>
                                 <option value="3">Truck/Pick-up </option>
                                 <option value="4">Bus </option>
                                 <option value="5">Tanker (Fuel) </option>
                                 <option value="6">Tempo </option>
                                 <option value="9">Taxi </option>
                                 <option value="11">Tractor </option>
                                 <option value="33">Electric Vehicle </option>
                                 <option value="34">Tanker (Water)</option>
                                 <option value="8">Private Car</option>
                                 <option value="36">Electric Vehicle(PV)</option>
                              </select>
                           </div>
						<div class="row">
						  <div class="col-lg-6">
                           <div class="form-group">
                              <label for="">Insured Amount</label>
                              <input type="text" name="pSuminsured_c" id="pSuminsured_c" class="form-control cc" placeholder="2000000">
                           </div>
                          </div>

                          <div class="col-lg-6">
                           <div class="form-group">
                              <label for="">Cubic Capacity (CC) </label>
                              <input type="text" name="pCC_HP_SEATS_c" id="pCC_HP_SEATS_c" class="form-control cc" placeholder="200">
                           </div>
                          </div>
                        </div>

                        <div class="row">
						  <div class="col-lg-6">
                           <div class="form-group">
                              <label for="">Manufacture Year </label>
                              <input type="text" name="pManufactureYr_c" id="pManufactureYr_c" class="form-control cc" placeholder="2018">
                           </div>
                          </div>

                          <div class="col-lg-6">
                           <div class="form-group">
                              <label for="">Access Own Damage </label>
                              <input type="text" name="pCExcess_c" id="pCExcess_c" class="form-control cc" placeholder="2000">
                           </div>
                          </div>
                        </div>


                         <div class="row">
						  <div class="col-lg-6">
                           <div class="form-group">
                              <label for="">Vehicle Age </label>
                              <input type="text" name="pVehicleAge_c" id="pVehicleAge_c" class="form-control cc" placeholder="2">
                           </div>
                          </div>

                          <div class="col-lg-6">
                           <div class="form-group">
                              <label for="">Issue Date</label>
                              <input type="text" name="pIssueDate_c" id="pIssueDate_c" class="form-control cc" placeholder="1-jan-2020">
                           </div>
                          </div>
                        </div>





                           <div class="row">
                              <div class="col-lg-6">
                                 	<div class="form-group">
		                              <label for="">Driver?</label>
		                              <select name="pNo_of_Driver_c" id="pNo_of_Driver_c" class="form-control pp" >
		                                 <option value="1">Yes</option>
		                                 <option value="0">No</option>
		                              </select>
		                           </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="">Passenger [Eg.: 3]</label>
                                    <input type="text" name="pNo_of_Passenger_c" id="pNo_of_Passenger_c" class="form-control pax" placeholder="4">
                                 </div>
                              </div>
                           </div>




                            <div class="row">
                            	<div class="col-lg-6">
		                           <div class="form-group">
		                              <label for="">Helper?</label>
		                              <select name="pNo_of_Helper_c" id="pNo_of_Helper_c" class="form-control pp" >
		                                 <option value="1">Yes</option>
		                                 <option value="0">No</option>
		                              </select>
		                           </div>
	                       		</div>
                              <div class="col-lg-6">
		                           <div class="form-group">
		                              <label for="">Is Pool?</label>
		                              <select name="pExcludePool_c" id="pExcludePool_c" class="form-control pp" >
		                                 <option value="true">Yes</option>
		                                 <option value="false">No</option>
		                              </select>
		                           </div>
	                       		</div>
	                       	</div>

	                       	<div class="row">
                            	<div class="col-lg-6">
		                           <div class="form-group">
		                              <label for="">Agent?</label>
		                              <select name="pHasAgent_c" id="pHasAgent_c" class="form-control pp" >
		                                 <option value="true">Yes</option>
		                                 <option value="false">No</option>
		                              </select>
		                           </div>
	                       		</div>
                              <div class="col-lg-6">
		                           <div class="form-group">
		                              <label for="">Towing Charge?</label>
		                              <select name="pIncludetowing_c" id="pIncludetowing_c" class="form-control pp" >
		                                 <option value="true">Yes</option>
		                                 <option value="false">No</option>
		                              </select>
		                           </div>
	                       		</div>
	                       	</div>



                           <div class="from-group">
                                 <!-- <button type="button" class="btn btn-primary submit_pcalculator">Submit</button> -->
                                <button type="button" class="btn btn-primary submit_pcalculator_c"><i class="fa fa-calculator"></i> Calculate</button>
                               
                           </div>
                        </form>


                        </div>





                        <div class="offset-lg-1 col-lg-6 result_div11" >
                                 <div class="section-title fnt-bld mb-15">
                                     <span class="vehicle_cat_c"></span>
                                 </div>
                                 <table class="table table-response table-striped table-sm">
                                    <tbody>
                                       <tr>
                                          <td>Total Premium</td>
                                          <td class="text-right TotalPremium_c"></td>
                                       </tr>
                                       <tr>
                                          <td>Stamp Duty</td>
                                          <td class="text-right StampDuty_c"></td>
                                       </tr>
                                       <tr>
                                          <td>Total Vatable</td>
                                          <td class="text-right TotalVatable_c"></td>
                                       </tr>
                                       <tr>
                                          <td>Tax</td>
                                          <td class="text-right Tax_c"></td>
                                       </tr>
                                       <tr>
                                          <td>Total Payable Prem</td>
                                          <td class="text-right TotalPayablePrem_c"></td>
                                       </tr>
                                      <!--  <tr>
                                          <td>VAT</td>
                                          <td class="text-right vat">NPR 821.6</td>
                                       </tr>
                                       <tr>
                                          <td>Total Amount</td>
                                          <td class="text-right">
                                             <h4 class="fnt-bld total_amount">NPR 7141.6</h4>
                                          </td>
                                       </tr> -->
                                    </tbody>
                                 </table>
                        </div>


                     </div>
                  </div>
               </div>
               <!--end of tab two-->
               <!-- <div class="tab " data-id="privatecarcomprehensive">
                  <h2>heading of tab three</h2>
                  <p>Content of tab three</p>
               </div> -->
               <!--end of tab three-->
               <!-- <div class="tab " data-id="goodscarrying">
                  <h2>goodscarrying</h2>
                  <p>Content of tab three</p>
               </div> -->
               <!--end of tab goodscarrying-->
            </div>
         </div>
      </div>
   </div>
</div>







































   	
<style>
   .tab {
   display: none;
   }
   .tab-active {
   display: block;
   }
   .tab-menu li {
   list-style: none;
   float: left;
   width: 100%;
   margin-bottom: 5px;
   }
   .tab-menu {
   float: left;
   width: 100%;
   margin: 20px 0;
   }
   .tab-menu ul {
   margin: 0;
   padding: 0;
   }
   table td {
    font-size: 14px;
}

td h4 {
    font-size: 17px;
    line-height: 1;
}
.form-group label {
    font-size: 14px;
    font-weight: bold;
}
</style>

