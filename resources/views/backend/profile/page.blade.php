@extends('layouts.backend')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="page-title-box">
			<h4 class="page-title">Advanced Plugins </h4>
			<ol class="breadcrumb p-0 m-0">
				<li>
					<a href="{{ route('dashboard') }}">Dashboard</a>
				</li>
				<li>
					<a href="#">Forms </a>
				</li>
				<li class="active">
					Advanced Plugins 
				</li>
			</ol>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- end row -->



<div class="row">
	<div class="col-xs-12">
		<div class="card-box">

			<div class="row">
				<div class="col-xs-12">

					<div class="row">
						<div class="col-md-6">
							<div class="demo-box">
								<h4 class="header-title m-t-0 m-b-20">Tags Input</h4>

								<h6>Input Tags</h6>
								<p class="text-muted m-b-20 font-13">
									Just add <code>data-role="tagsinput"</code> to your input field to automatically change it to a tags input field.
								</p>
								<div class="tags-default">
									<input type="text" value="Amsterdam,Washington,Sydney" data-role="tagsinput" placeholder="add tags"/>
								</div>

								<h6 class="m-t-30">True multi value</h6>
								<p class="text-muted m-b-20 font-13">
									Use a <code>&lt;select multiple /&gt;</code> as your input element for a tags input, to gain true multivalue support.
									Instead of a comma separated string, the values will be set in an array. Existing <code>&lt;option /&gt;</code>
									elements will automatically be set as tags. This makes it also possible to create tags containing a comma.
								</p>
								<div class="m-b-0">
									<select multiple data-role="tagsinput">
										<option value="Amsterdam">Amsterdam</option>
										<option value="Washington">Washington</option>
										<option value="Sydney">Sydney</option>
									</select>
								</div>
							</div>

						</div>

						<div class="col-md-6">
							<div class="demo-box">
								<h4 class="header-title m-t-0 m-b-0">Switchery</h4>

								<h6>Basic</h6>
								<p class="text-muted m-b-20 font-13">
									Add an attribute <code>
									data-plugin="switchery" data-color="@colors"</code>
									to your input element and it will be converted into switch.
								</p>

								<div class="switchery-demo">
									<input type="checkbox" checked data-plugin="switchery" data-color="#039cfd"/>
									<input type="checkbox" checked data-plugin="switchery" data-color="#f1b53d"/>
									<input type="checkbox" checked data-plugin="switchery" data-color="#1bb99a"/>
									<input type="checkbox" checked data-plugin="switchery" data-color="#ff5d48"/>
									<input type="checkbox" checked data-plugin="switchery" data-color="#3db9dc"/>
									<input type="checkbox" checked data-plugin="switchery" data-color="#2b3d51"/>
									<input type="checkbox" checked data-plugin="switchery" data-color="#9261c6"/>
									<input type="checkbox" checked data-plugin="switchery" data-color="#ff7aa3"/>
									<input type="checkbox" checked data-plugin="switchery" data-color="#98a6ad"/>
								</div>


								<h6 class="m-t-30">Sizes & Secondary color</h6>
								<p class="text-muted m-b-30 font-13">
									Add an attribute <code>
									data-size="small",data-size="large"</code>
									to your input element and it will be converted into switch.
									Add an attribute <code>
									data-color="@color" data-secondary-color="@color"</code>
									to your input element and it will be converted into switch.
								</p>

								<div class="switchery-demo">
									<input type="checkbox" checked data-plugin="switchery" data-color="#64b0f2" data-size="small"/>
									<input type="checkbox" checked data-plugin="switchery" data-color="#ff7aa3"/>
									<input type="checkbox" checked data-plugin="switchery" data-color="#2b3d51" data-size="large"/>
									<input type="checkbox" data-plugin="switchery" data-color="#1bb99a" data-secondary-color="#ff5d48" />
									<input type="checkbox" data-plugin="switchery" data-color="#9261c6"  data-secondary-color="#ff7aa3" checked />
								</div>


							</div>

						</div>

					</div><!-- end row -->

				</div>

			</div>
			<!-- end row -->


			<div class="row">
				<div class="col-md-6">

					<div class="demo-box m-t-50">
						<h4 class="header-title m-t-0">Css Switch</h4>
						<p class="text-muted m-b-20 font-13">
							Here are a few types of switches.
						</p>

						<div>
							<input type="checkbox" id="switch1" checked data-switch="none"/>
							<label for="switch1" data-on-label="On"
							data-off-label="Off"></label>

							<input type="checkbox" id="switch2" data-switch="default"/>
							<label for="switch2" data-on-label=""
							data-off-label=""></label>

							<input type="checkbox" id="switch3" data-switch="bool"/>
							<label for="switch3" data-on-label="Yes"
							data-off-label="No"></label>

							<input type="checkbox" id="switch6" data-switch="primary" checked/>
							<label for="switch6" data-on-label="Yes"
							data-off-label="No"></label>

							<input type="checkbox" id="switch4" data-switch="success" checked/>
							<label for="switch4" data-on-label="Yes"
							data-off-label="No"></label>

							<input type="checkbox" id="switch7" data-switch="info" checked/>
							<label for="switch7" data-on-label="Yes"
							data-off-label="No"></label>

							<input type="checkbox" id="switch5" data-switch="warning"/>
							<label for="switch5" data-on-label="Yes"
							data-off-label="No"></label>

							<input type="checkbox" id="switch8" data-switch="danger" checked/>
							<label for="switch8" data-on-label="Yes"
							data-off-label="No"></label>

							<input type="checkbox" id="switch9" data-switch="inverse" checked/>
							<label for="switch9" data-on-label="Yes"
							data-off-label="No"></label>

							<input type="checkbox" id="switch10" data-switch="orange" checked/>
							<label for="switch10" data-on-label="Yes"
							data-off-label="No"></label>

							<input type="checkbox" id="switch11" data-switch="brown" checked/>
							<label for="switch11" data-on-label="Yes"
							data-off-label="No"></label>

							<input type="checkbox" id="switch12" data-switch="teal" checked/>
							<label for="switch12" data-on-label="Yes"
							data-off-label="No"></label>

							<input type="checkbox" id="switch13" data-switch="pink" checked/>
							<label for="switch13" data-on-label="Yes"
							data-off-label="No"></label>

							<input type="checkbox" id="switch14" data-switch="purple" checked/>
							<label for="switch14" data-on-label="Yes"
							data-off-label="No"></label>

						</div>
					</div>

				</div> <!-- end col -->

				<div class="col-md-6">

					<div class="demo-box m-t-50">
						<h4 class="header-title m-t-0">Button Switch</h4>
						<p class="text-muted m-b-20 font-13">
							Here are a few types of switches.
						</p>

						<div class="button-list">

							<div class="btn-switch btn-switch-custom">
								<input type="checkbox" id="input-btn-switch-custom"/>
								<label for="input-btn-switch-custom"
								class="btn btn-rounded btn-custom waves-effect waves-light">
								<em class="glyphicon glyphicon-ok"></em>
								<strong> Custom</strong>
							</label>
						</div>

						<div class="btn-switch btn-switch-primary">
							<input type="checkbox" id="input-btn-switch-primary"/>
							<label for="input-btn-switch-primary"
							class="btn btn-rounded btn-primary waves-effect waves-light">
							<em class="glyphicon glyphicon-ok"></em>
							<strong> Primary</strong>
						</label>
					</div>

					<div class="btn-switch btn-switch-success">
						<input type="checkbox" id="input-btn-switch-success" checked/>
						<label for="input-btn-switch-success"
						class="btn btn-rounded btn-success waves-effect waves-light">
						<em class="glyphicon glyphicon-ok"></em>
						<strong> Success</strong>
					</label>
				</div>

				<div class="btn-switch btn-switch-info">
					<input type="checkbox" id="input-btn-switch-info"/>
					<label for="input-btn-switch-info"
					class="btn btn-rounded btn-info waves-effect waves-light">
					<em class="glyphicon glyphicon-ok"></em>
					<strong> Info</strong>
				</label>
			</div>

			<div class="btn-switch btn-switch-warning">
				<input type="checkbox" id="input-btn-switch-warning"/>
				<label for="input-btn-switch-warning"
				class="btn btn-rounded btn-warning waves-effect waves-light">
				<em class="glyphicon glyphicon-ok"></em>
				<strong> Warning</strong>
			</label>
		</div>

		<div class="btn-switch btn-switch-danger">
			<input type="checkbox" id="input-btn-switch-danger" checked />
			<label for="input-btn-switch-danger"
			class="btn btn-rounded btn-danger waves-effect waves-light">
			<em class="glyphicon glyphicon-ok"></em>
			<strong> Danger</strong>
		</label>
	</div>

	<div class="btn-switch btn-switch-inverse">
		<input type="checkbox" id="input-btn-switch-inverse"/>
		<label for="input-btn-switch-inverse"
		class="btn btn-rounded btn-inverse waves-effect waves-light">
		<em class="glyphicon glyphicon-ok"></em>
		<strong> Inverse</strong>
	</label>
</div>

<div class="btn-switch btn-switch-pink">
	<input type="checkbox" id="input-btn-switch-pink" checked />
	<label for="input-btn-switch-pink"
	class="btn btn-rounded btn-pink waves-effect waves-light">
	<em class="glyphicon glyphicon-ok"></em>
	<strong> Pink</strong>
</label>
</div>

<div class="btn-switch btn-switch-purple">
	<input type="checkbox" id="input-btn-switch-purple"/>
	<label for="input-btn-switch-purple"
	class="btn btn-rounded btn-purple waves-effect waves-light">
	<em class="glyphicon glyphicon-ok"></em>
	<strong> Purple</strong>
</label>
</div>

<div class="btn-switch btn-switch-orange">
	<input type="checkbox" id="input-btn-switch-orange"/>
	<label for="input-btn-switch-orange"
	class="btn btn-rounded btn-orange waves-effect waves-light">
	<em class="glyphicon glyphicon-ok"></em>
	<strong> Orange</strong>
</label>
</div>

<div class="btn-switch btn-switch-brown">
	<input type="checkbox" id="input-btn-switch-brown" checked />
	<label for="input-btn-switch-brown"
	class="btn btn-rounded btn-brown waves-effect waves-light">
	<em class="glyphicon glyphicon-ok"></em>
	<strong> Brown</strong>
</label>
</div>

<div class="btn-switch btn-switch-teal">
	<input type="checkbox" id="input-btn-switch-teal"/>
	<label for="input-btn-switch-teal"
	class="btn btn-rounded btn-teal waves-effect waves-light">
	<em class="glyphicon glyphicon-ok"></em>
	<strong> Teal</strong>
</label>
</div>

</div>
<!-- end button-demo -->
</div> <!-- end demo-box -->

</div> <!-- end col -->
</div>
<!-- end row -->


<div class="row m-t-50">
	<div class="col-sm-12 col-xs-12">

		<div class="demo-box">
			<h4 class="header-title m-t-0 m-b-0">Multiple Select</h4>

			<div class="row">
				<div class="col-lg-4 m-t-20">
					<h6>Default</h6>
					<p class="text-muted m-b-20 font-13">
						Use a <code>
						&lt;select multiple /&gt;</code>
						as your input element for a tags input, to gain true multivalue support.
					</p>

					<select multiple="multiple" class="multi-select" id="my_multi_select1" name="my_multi_select1[]" data-plugin="multiselect">
						<option>Dallas Cowboys</option>
						<option>New York Giants</option>
						<option selected>Philadelphia Eagles</option>
						<option selected>Washington Redskins</option>
						<option>Chicago Bears</option>
						<option>Detroit Lions</option>
						<option>Green Bay Packers</option>
						<option>Minnesota Vikings</option>
						<option selected>Atlanta Falcons</option>
						<option>Carolina Panthers</option>
						<option>New Orleans Saints</option>
						<option>Tampa Bay Buccaneers</option>
						<option>Arizona Cardinals</option>
						<option>St. Louis Rams</option>
						<option>San Francisco 49ers</option>
						<option>Seattle Seahawks</option>
					</select>

				</div>

				<div class="col-lg-4 m-t-20">
					<h6>Grouped Options</h6>
					<p class="text-muted m-b-20 font-13">
						Use a <code>
						&lt;select multiple /&gt;</code>
						as your input element for a tags input, to gain true multivalue support.
					</p>

					<select multiple="multiple" class="multi-select" id="my_multi_select2" name="my_multi_select2[]" data-plugin="multiselect" data-selectable-optgroup="true">
						<optgroup label="NFC EAST">
							<option>Dallas Cowboys</option>
							<option>New York Giants</option>
							<option>Philadelphia Eagles</option>
							<option>Washington Redskins</option>
						</optgroup>
						<optgroup label="NFC NORTH">
							<option>Chicago Bears</option>
							<option>Detroit Lions</option>
							<option>Green Bay Packers</option>
							<option>Minnesota Vikings</option>
						</optgroup>
						<optgroup label="NFC SOUTH">
							<option>Atlanta Falcons</option>
							<option>Carolina Panthers</option>
							<option>New Orleans Saints</option>
							<option>Tampa Bay Buccaneers</option>
						</optgroup>
						<optgroup label="NFC WEST">
							<option>Arizona Cardinals</option>
							<option>St. Louis Rams</option>
							<option>San Francisco 49ers</option>
							<option>Seattle Seahawks</option>
						</optgroup>
					</select>

				</div>

				<div class="col-lg-4 m-t-20">
					<h6>Searchable</h6>
					<p class="text-muted m-b-20 font-13">
						Use a <code>
						&lt;select multiple /&gt;</code>
						as your input element for a tags input, to gain true multivalue support.
					</p>

					<select name="country" class="multi-select" multiple="" id="my_multi_select3" >
						<option value="AF">Afghanistan</option>
						<option value="AL">Albania</option>
						<option value="DZ">Algeria</option>
						<option value="AS">American Samoa</option>
						<option value="AD">Andorra</option>
						<option value="AO">Angola</option>
						<option value="AI">Anguilla</option>
						<option value="AQ">Antarctica</option>
						<option value="AR">Argentina</option>
						<option value="AM">Armenia</option>
						<option value="AW">Aruba</option>
						<option value="AU">Australia</option>
						<option value="AT">Austria</option>
						<option value="AZ">Azerbaijan</option>
						<option value="BS">Bahamas</option>
						<option value="BH">Bahrain</option>
						<option value="BD">Bangladesh</option>
						<option value="BB">Barbados</option>
						<option value="BY">Belarus</option>
						<option value="BE">Belgium</option>
						<option value="BZ">Belize</option>
						<option value="BJ">Benin</option>
						<option value="BM">Bermuda</option>
						<option value="BT">Bhutan</option>
						<option value="BO">Bolivia</option>
						<option value="BA">Bosnia and Herzegowina</option>
						<option value="BW">Botswana</option>
						<option value="BV">Bouvet Island</option>
						<option value="BR">Brazil</option>
						<option value="IO">British Indian Ocean Territory</option>
						<option value="BN">Brunei Darussalam</option>
						<option value="BG">Bulgaria</option>
						<option value="BF">Burkina Faso</option>
						<option value="BI">Burundi</option>
						<option value="KH">Cambodia</option>
						<option value="CM">Cameroon</option>
						<option value="CA">Canada</option>
						<option value="CV">Cape Verde</option>
						<option value="KY">Cayman Islands</option>
						<option value="CF">Central African Republic</option>
						<option value="TD">Chad</option>
						<option value="CL">Chile</option>
						<option value="CN">China</option>
						<option value="CX">Christmas Island</option>
						<option value="CC">Cocos (Keeling) Islands</option>
						<option value="CO">Colombia</option>
						<option value="KM">Comoros</option>
						<option value="CG">Congo</option>
						<option value="CD">Congo, the Democratic Republic of the</option>
						<option value="CK">Cook Islands</option>
						<option value="CR">Costa Rica</option>
						<option value="CI">Cote d'Ivoire</option>
						<option value="HR">Croatia (Hrvatska)</option>
						<option value="CU">Cuba</option>
						<option value="CY">Cyprus</option>
						<option value="CZ">Czech Republic</option>
						<option value="DK">Denmark</option>
						<option value="DJ">Djibouti</option>
						<option value="DM">Dominica</option>
						<option value="DO">Dominican Republic</option>
						<option value="EC">Ecuador</option>
						<option value="EG">Egypt</option>
						<option value="SV">El Salvador</option>
						<option value="GQ">Equatorial Guinea</option>
						<option value="ER">Eritrea</option>
						<option value="EE">Estonia</option>
						<option value="ET">Ethiopia</option>
						<option value="FK">Falkland Islands (Malvinas)</option>
						<option value="FO">Faroe Islands</option>
						<option value="FJ">Fiji</option>
						<option value="FI">Finland</option>
						<option value="FR">France</option>
						<option value="GF">French Guiana</option>
						<option value="PF">French Polynesia</option>
						<option value="TF">French Southern Territories</option>
						<option value="GA">Gabon</option>
						<option value="GM">Gambia</option>
						<option value="GE">Georgia</option>
						<option value="DE">Germany</option>
						<option value="GH">Ghana</option>
						<option value="GI">Gibraltar</option>
						<option value="GR">Greece</option>
						<option value="GL">Greenland</option>
						<option value="GD">Grenada</option>
						<option value="GP">Guadeloupe</option>
						<option value="GU">Guam</option>
						<option value="GT">Guatemala</option>
						<option value="GN">Guinea</option>
						<option value="GW">Guinea-Bissau</option>
						<option value="GY">Guyana</option>
						<option value="HT">Haiti</option>
						<option value="HM">Heard and Mc Donald Islands</option>
						<option value="VA">Holy See (Vatican City State)</option>
						<option value="HN">Honduras</option>
						<option value="HK">Hong Kong</option>
						<option value="HU">Hungary</option>
						<option value="IS">Iceland</option>
						<option value="IN">India</option>
						<option value="ID">Indonesia</option>
						<option value="IR">Iran (Islamic Republic of)</option>
						<option value="IQ">Iraq</option>
						<option value="IE">Ireland</option>
						<option value="IL">Israel</option>
						<option value="IT">Italy</option>
						<option value="JM">Jamaica</option>
						<option value="JP">Japan</option>
						<option value="JO">Jordan</option>
						<option value="KZ">Kazakhstan</option>
						<option value="KE">Kenya</option>
						<option value="KI">Kiribati</option>
						<option value="KP">Korea, Democratic People's Republic of</option>
						<option value="KR">Korea, Republic of</option>
						<option value="KW">Kuwait</option>
						<option value="KG">Kyrgyzstan</option>
						<option value="LA">Lao People's Democratic Republic</option>
						<option value="LV">Latvia</option>
						<option value="LB">Lebanon</option>
						<option value="LS">Lesotho</option>
						<option value="LR">Liberia</option>
						<option value="LY">Libyan Arab Jamahiriya</option>
						<option value="LI">Liechtenstein</option>
						<option value="LT">Lithuania</option>
						<option value="LU">Luxembourg</option>
						<option value="MO">Macau</option>
						<option value="MK">Macedonia, The Former Yugoslav Republic of</option>
						<option value="MG">Madagascar</option>
						<option value="MW">Malawi</option>
						<option value="MY">Malaysia</option>
						<option value="MV">Maldives</option>
						<option value="ML">Mali</option>
						<option value="MT">Malta</option>
						<option value="MH">Marshall Islands</option>
						<option value="MQ">Martinique</option>
						<option value="MR">Mauritania</option>
						<option value="MU">Mauritius</option>
						<option value="YT">Mayotte</option>
						<option value="MX">Mexico</option>
						<option value="FM">Micronesia, Federated States of</option>
						<option value="MD">Moldova, Republic of</option>
						<option value="MC">Monaco</option>
						<option value="MN">Mongolia</option>
						<option value="MS">Montserrat</option>
						<option value="MA">Morocco</option>
						<option value="MZ">Mozambique</option>
						<option value="MM">Myanmar</option>
						<option value="NA">Namibia</option>
						<option value="NR">Nauru</option>
						<option value="NP">Nepal</option>
						<option value="NL">Netherlands</option>
						<option value="AN">Netherlands Antilles</option>
						<option value="NC">New Caledonia</option>
						<option value="NZ">New Zealand</option>
						<option value="NI">Nicaragua</option>
						<option value="NE">Niger</option>
						<option value="NG">Nigeria</option>
						<option value="NU">Niue</option>
						<option value="NF">Norfolk Island</option>
						<option value="MP">Northern Mariana Islands</option>
						<option value="NO">Norway</option>
						<option value="OM">Oman</option>
						<option value="PK">Pakistan</option>
						<option value="PW">Palau</option>
						<option value="PA">Panama</option>
						<option value="PG">Papua New Guinea</option>
						<option value="PY">Paraguay</option>
						<option value="PE">Peru</option>
						<option value="PH">Philippines</option>
						<option value="PN">Pitcairn</option>
						<option value="PL">Poland</option>
						<option value="PT">Portugal</option>
						<option value="PR">Puerto Rico</option>
						<option value="QA">Qatar</option>
						<option value="RE">Reunion</option>
						<option value="RO">Romania</option>
						<option value="RU">Russian Federation</option>
						<option value="RW">Rwanda</option>
						<option value="KN">Saint Kitts and Nevis</option>
						<option value="LC">Saint LUCIA</option>
						<option value="VC">Saint Vincent and the Grenadines</option>
						<option value="WS">Samoa</option>
						<option value="SM">San Marino</option>
						<option value="ST">Sao Tome and Principe</option>
						<option value="SA">Saudi Arabia</option>
						<option value="SN">Senegal</option>
						<option value="SC">Seychelles</option>
						<option value="SL">Sierra Leone</option>
						<option value="SG">Singapore</option>
						<option value="SK">Slovakia (Slovak Republic)</option>
						<option value="SI">Slovenia</option>
						<option value="SB">Solomon Islands</option>
						<option value="SO">Somalia</option>
						<option value="ZA">South Africa</option>
						<option value="GS">South Georgia and the South Sandwich Islands</option>
						<option value="ES">Spain</option>
						<option value="LK">Sri Lanka</option>
						<option value="SH">St. Helena</option>
						<option value="PM">St. Pierre and Miquelon</option>
						<option value="SD">Sudan</option>
						<option value="SR">Suriname</option>
						<option value="SJ">Svalbard and Jan Mayen Islands</option>
						<option value="SZ">Swaziland</option>
						<option value="SE">Sweden</option>
						<option value="CH">Switzerland</option>
						<option value="SY">Syrian Arab Republic</option>
						<option value="TW">Taiwan, Province of China</option>
						<option value="TJ">Tajikistan</option>
						<option value="TZ">Tanzania, United Republic of</option>
						<option value="TH">Thailand</option>
						<option value="TG">Togo</option>
						<option value="TK">Tokelau</option>
						<option value="TO">Tonga</option>
						<option value="TT">Trinidad and Tobago</option>
						<option value="TN">Tunisia</option>
						<option value="TR">Turkey</option>
						<option value="TM">Turkmenistan</option>
						<option value="TC">Turks and Caicos Islands</option>
						<option value="TV">Tuvalu</option>
						<option value="UG">Uganda</option>
						<option value="UA">Ukraine</option>
						<option value="AE">United Arab Emirates</option>
						<option value="GB">United Kingdom</option>
						<option value="US">United States</option>
						<option value="UM">United States Minor Outlying Islands</option>
						<option value="UY">Uruguay</option>
						<option value="UZ">Uzbekistan</option>
						<option value="VU">Vanuatu</option>
						<option value="VE">Venezuela</option>
						<option value="VN">Viet Nam</option>
						<option value="VG">Virgin Islands (British)</option>
						<option value="VI">Virgin Islands (U.S.)</option>
						<option value="WF">Wallis and Futuna Islands</option>
						<option value="EH">Western Sahara</option>
						<option value="YE">Yemen</option>
						<option value="ZM">Zambia</option>
						<option value="ZW">Zimbabwe</option>
					</select>

				</div>

			</div> <!-- end row -->
		</div> <!-- end demo-box -->

	</div> <!-- end col -->

</div>
<!-- end row -->





<div class="row m-t-50">
	<div class="col-lg-12">
		<div class="demo-box p-b-0">
			<h4 class="header-title m-t-0 m-b-0">Bootstrap MaxLength</h4>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="demo-box">
					<h6 class="text-muted"><b>Default usage</b></h6>
					<p class="text-muted m-b-15 font-13">
						The badge will show up by default when the remaining chars are 10 or less:
					</p>
					<input type="text" class="form-control" maxlength="25" name="defaultconfig" id="defaultconfig" />

					<div class="m-t-20">
						<h6 class="text-muted"><b>Threshold value</b></h6>
						<p class="text-muted m-b-15 font-13">
							Do you want the badge to show up when there are 20 chars or less? Use the <code>threshold</code> option:
						</p>
						<input type="text" maxlength="25" name="thresholdconfig" class="form-control" id="thresholdconfig" />
					</div>

					<div class="m-t-20">
						<h6 class="text-muted"><b>All the options</b></h6>
						<p class="text-muted m-b-15 font-13">
							Please note: if the <code>alwaysShow</code> option is enabled, the <code>threshold</code> option is ignored.
						</p>
						<input type="text" class="form-control" maxlength="25" name="alloptions" id="alloptions" />
					</div>

				</div>
			</div>

			<div class="col-md-6">
				<div class="demo-box">

					<h6 class="text-muted"><b>Position</b></h6>
					<p class="text-muted m-b-15 font-13">
						All you need to do is specify the <code>placement</code> option, with one of those strings. If none
						is specified, the positioning will be defauted to 'bottom'.
					</p>
					<input type="text" class="form-control" maxlength="25" name="placement" id="placement" />

					<div class="m-t-20">
						<h6 class="text-muted"><b>textareas</b></h6>
						<p class="text-muted m-b-15 font-13">
							Bootstrap maxlength supports textarea as well as inputs. Even on old IE.
						</p>
						<textarea id="textarea" class="form-control" maxlength="225" rows="3" placeholder="This textarea has a limit of 225 chars."></textarea>
					</div>
				</div>
			</div>
		</div>
		<!-- end row -->

	</div> <!-- end col -->

</div>
<!-- end row -->



<div class="row m-t-50">
	<div class="col-sm-12">
		<div class="demo-box p-b-0">
			<h4 class="m-t-0 header-title"><b>Bootstrap TouchSpin</b></h4>
			<p class="text-muted font-13">
				You can limit the number of elements you are allowed to select via the
				<code>
					data-max-option
				</code>
				attribute. It also works for option groups.
			</p>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="demo-box">
					<form>
						<div class="form-group">
							<label class="control-label">Vertical button alignment</label>
							<input class="vertical-spin" type="text" value="" name="vertical-spin">
						</div>
						<div class="form-group">
							<label class="control-label">Using data attributes</label>
							<input id="demo0" type="text" value="55" name="demo0" data-bts-min="0" data-bts-max="100" data-bts-init-val="" data-bts-step="1" data-bts-decimal="0" data-bts-step-interval="100" data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500" data-bts-prefix="" data-bts-postfix="" data-bts-prefix-extra-class="" data-bts-postfix-extra-class="" data-bts-booster="true" data-bts-boostat="10" data-bts-max-boosted-step="false" data-bts-mousewheel="true" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default"/>
						</div>
						<div class="form-group">
							<label class="control-label">Example with postfix (large)</label>
							<input id="demo1" type="text" value="55" name="demo1">
						</div>
						<div class="form-group m-b-0">
							<label class="control-label">With prefix </label>
							<input id="demo2" type="text" value="0" name="demo2" class=" form-control">
						</div>

					</form>
				</div>
			</div>

			<div class="col-md-6">
				<div class="demo-box">
					<form>

						<div class="form-group">
							<label class="control-label">Init with empty value:</label>
							<input id="demo3" type="text" value="" name="demo3">
						</div>
						<div class="form-group">
							<label class="control-label">Value attribute is not set (applying settings.initval)</label>
							<input id="demo3_21" type="text" value="" name="demo3_21">
						</div>
						<div class="form-group">
							<label class="control-label">Value is set explicitly to 33 (skipping settings.initval) </label>
							<input id="demo3_22" type="text" value="33" name="demo3_22">
						</div>
						<div class="form-group m-b-0">
							<label class="control-label">Button group</label>
							<div class="input-group">
								<input id="demo5" type="text" class="form-control" name="demo5" value="50">
								<div class="input-group-btn">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<ul class="dropdown-menu pull-right" role="menu">
										<li>
											<a href="#">Action</a>
										</li>
										<li>
											<a href="#">Another action</a>
										</li>
										<li>
											<a href="#">Something else here</a>
										</li>
										<li class="divider"></li>
										<li>
											<a href="#">Separated link</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div> <!-- end row -->
	</div> <!-- end col -->
</div>
<!-- end row -->


<!-- Bootstrap-select -->
<div class="row m-t-50">
	<div class="col-sm-12">
		<div class="demo-box">
			<h4 class="m-t-0 header-title"><b>Bootstrap-select</b></h4>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="demo-box">
					<p class="text-muted m-b-15 font-13">
						Create your
						<code>
							&lt;select&gt;
						</code>
						with the
						<code>
							.selectpicker
						</code>
						class.
					</p>
					<select class="selectpicker" data-style="btn-custom">
						<option>Mustard</option>
						<option>Ketchup</option>
						<option>Relish</option>
					</select>

					<p class="text-muted m-b-15 m-t-30 font-13">
						It also works with option groups:
					</p>
					<select class="selectpicker" data-style="btn-default">
						<optgroup label="Picnic">
							<option>Mustard</option>
							<option>Ketchup</option>
							<option>Relish</option>
						</optgroup>
						<optgroup label="Camping">
							<option>Tent</option>
							<option>Flashlight</option>
							<option>Toilet Paper</option>
						</optgroup>
					</select>

					<p class="text-muted m-b-15 m-t-30 font-13">
						You can also show the tick icon on single <code>select</code> with the <code>show-tick</code> class:
					</p>

					<select class="selectpicker show-tick" data-style="btn-success">
						<option>Mustard</option>
						<option>Ketchup</option>
						<option>Relish</option>
					</select>

					<p class="text-muted m-b-15 m-t-30 font-13">
						And with multiple selects:
					</p>
					<select class="selectpicker" multiple data-style="btn-default">
						<option>Mustard</option>
						<option>Ketchup</option>
						<option>Relish</option>
					</select>

					<p class="text-muted m-b-15 m-t-30 font-13">
						You can limit the number of elements you are allowed to select via the
						<code>
							data-max-option
						</code>
						attribute. It also works for option groups.
					</p>

					<select class="selectpicker m-b-0" multiple data-max-options="2" data-style="btn-pink">
						<option>Mustard</option>
						<option>Ketchup</option>
						<option>Relish</option>
					</select>

				</div>
			</div>

			<div class="col-md-4">
				<div class="demo-box">
					<p class="text-muted m-b-15 font-13">
						You can limit the number of elements you are allowed to select via the
						<code>
							data-max-option
						</code>
						attribute. It also works for option groups.
					</p>

					<select class="selectpicker" data-style="btn-default btn-rounded">
						<option>Mustard</option>
						<option>Ketchup</option>
						<option>Relish</option>
					</select>

					<br />
					<br />
					<select class="selectpicker" data-style="btn-primary btn-bordered">
						<option>Mustard</option>
						<option>Ketchup</option>
						<option>Relish</option>
					</select>

					<br />
					<br />
					<select class="selectpicker" data-style="btn-teal">
						<option>Mustard</option>
						<option>Ketchup</option>
						<option>Relish</option>
					</select>

					<br />
					<br />
					<select class="selectpicker" data-style="btn-warning">
						<option>Mustard</option>
						<option>Ketchup</option>
						<option>Relish</option>
					</select>

					<br />
					<br />
					<select class="selectpicker" data-style="btn-danger btn-bordered">
						<option>Mustard</option>
						<option>Ketchup</option>
						<option>Relish</option>
					</select>

					<br />
					<br />
					<select class="selectpicker" data-style="btn-purple">
						<option>Mustard</option>
						<option>Ketchup</option>
						<option>Relish</option>
					</select>

					<p class="text-muted m-b-15 m-t-30 font-13">
						Add an icon to an option or optgroup with the <code>data-icon</code> attribute:
					</p>
					<select class="selectpicker m-b-0" data-style="btn-default">
						<option data-icon="glyphicon-glass text-primary">Mustard</option>
						<option data-icon="glyphicon-heart">Ketchup</option>
						<option data-icon="glyphicon-film">Relish</option>
						<option data-icon="glyphicon-home">Mayonnaise</option>
						<option data-icon="glyphicon-print">Barbecue Sauce</option>
					</select>

				</div>
			</div>

			<div class="col-md-4">
				<div class="demo-box">
					<p class="text-muted m-b-15 font-13">
						You can add a search input by passing <code>data-live-search="true"</code> attribute:
					</p>

					<select class="selectpicker" data-live-search="true"  data-style="btn-success">
						<option>Hot Dog, Fries and a Soda</option>
						<option>Burger, Shake and a Smile</option>
						<option>Sugar, Spice and all things nice</option>
					</select>

					<p class="text-muted m-b-15 m-t-30 font-13">
						You can also use the <code>
						title</code> attribute as an alternative to display when the option is
						selected:
					</p>

					<select class="selectpicker" data-live-search="true" data-style="btn-default">
						<option title="Combo 1">Hot Dog, Fries and a Soda</option>
						<option title="Combo 2">Burger, Shake and a Smile</option>
						<option title="Combo 3">Sugar, Spice and all things nice</option>
					</select>

					<p class="text-muted m-b-15 m-t-30 font-13">
						Using the <code>data-selected-text-format</code> attribute on a <code>multiple select</code>
						you can specify how the selection is displayed.
					</p>

					<select class="selectpicker" multiple data-selected-text-format="count" data-style="btn-default">
						<option>Mustard</option>
						<option>Ketchup</option>
						<option>Relish</option>
					</select>

					<br/>
					<br/>
					<select class="selectpicker" multiple data-selected-text-format="count > 3" data-style="btn-default">
						<option>Mustard</option>
						<option>Ketchup</option>
						<option>Relish</option>
						<option>Onions</option>
					</select>

					<p class="text-muted m-b-15 m-t-30 font-13">
						Add the <code>disabled</code> attribute to the select to apply the <code>disabled</code> class.
					</p>
					<select class="selectpicker m-b-0" data-style="btn-teal" disabled>
						<option>Mustard</option>
						<option>Ketchup</option>
						<option>Relish</option>
					</select>


				</div>
			</div>
		</div> <!-- end row -->

	</div> <!-- end col -->
</div>
<!-- end row -->


<div class="row m-t-50">
	<div class="col-sm-12">
		<div class="demo-box p-b-0">
			<h4 class="m-t-0 header-title"><b>Bootstrap FileStyle</b></h4>
			<p class="text-muted m-b-15 font-13">
				You can limit the number of elements you are allowed to select via the
				<code>
					data-max-option
				</code>
				attribute. It also works for option groups.
			</p>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="demo-box">
					<form>
						<div class="form-group">
							<label class="control-label">Default file input</label>
							<input type="file" class="filestyle" data-buttonname="btn-default">
						</div>
						<div class="form-group">
							<label class="control-label">File style without input</label>
							<input type="file" class="filestyle" data-input="false">
						</div>
						<div class="form-group">
							<label class="control-label">File style without icon</label>
							<input type="file" class="filestyle" data-icon="false" data-buttonname="btn-default">
						</div>
						<div class="form-group">
							<label class="control-label">File style with custom text</label>
							<input type="file" class="filestyle" data-buttontext="Select file" data-buttonname="btn-default">
						</div>
						<div class="form-group m-b-0">
							<label class="control-label">File style with button style</label>
							<input type="file" class="filestyle" data-buttonname="btn-primary">
						</div>

					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="demo-box">
					<form>
						<div class="form-group">
							<label class="control-label">Small file style</label>
							<input type="file" class="filestyle" data-size="sm">
						</div>
						<div class="form-group">
							<label class="control-label">File style with custom icon</label>
							<input type="file" class="filestyle" data-iconname="fa fa-cloud-upload">
						</div>
						<div class="form-group">
							<label class="control-label">Disable file style</label>
							<input type="file" class="filestyle" data-disabled="true">
						</div>
						<div class="form-group">
							<label class="control-label">File style before button</label>
							<input type="file" class="filestyle" data-buttonbefore="true">
						</div>
						<div class="form-group m-b-0">
							<label class="control-label">File style placeholder</label>
							<input type="file" class="filestyle" data-placeholder="No file">
						</div>
					</form>
				</div>
			</div>
		</div> <!-- end row -->
	</div> <!-- end col -->
</div>
<!-- end row -->
</div> <!-- end card-box -->
</div><!-- end col-->
</div>
<!-- end row -->
@endsection