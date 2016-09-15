'use strict';
angular.module('appTest', ["ui.bootstrap","ngTouch"]);
angular.module("appTest")
    .factory("SeveralUseful", function (Statics) {
        var PrototypeRequestHttp = function () {
			
			var shootRequestPhp = function (RequestType, UrlSuffix, ObjectToSend) {

                var FinalUrl = Statics.URL + UrlSuffix;
                RequestType = angular.uppercase(RequestType);
				
                var ObjectToSendFinal = angular.isUndefined(ObjectToSend) || ObjectToSend === null ? null : ObjectToSend;
				//convert object-json to form-data
				var form_data = new FormData();
				if(ObjectToSendFinal !== null){
					for ( var key in ObjectToSendFinal ) {
					form_data.append(key, ObjectToSendFinal[key]);
					}
					
				}

				return $.ajax({
					url         : FinalUrl,
					data        : form_data,
					processData : false,
					contentType : false,
					type: RequestType,
					dataType :"json"
				});
				
                
            };

            return {
				shootRequestPhp:shootRequestPhp
            };

        };


        return {
            PrototypeRequestHttp: PrototypeRequestHttp
        };
    });
