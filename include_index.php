 <div class="container">
        <div id="apiDiv">
            <h3>Inserire il nome dell'ingrediente e cliccare sul pulsante Ricerca</h3>
            <input type="text" id="searchInput" placeholder="Inserisci ingrediente" />
            <button id="submit">Ricerca</button>
            <div class="imageDiv">
                <img src="img/loading.gif" />
            </div>
            <div id="message">
         </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="modalTitleH4"></h4>
                </div>
                <div class="modal-body" id="modalBodyDiv">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#reset").click(function (e) {
                location.reload();
            });

            $("#submit").click(function (e) {
                var validate = Validate();
                $("#message").html(validate);
                if (validate.length == 0) {
                    CallAPI(1);
                }
            });

            $("#message").on("click", ".result", function () {
                var resourceId = $(this).attr("resourceId");
                $.ajax({
                    url: 

"http://food2fork.com/api/get?rId=" + resourceId + "",
                    data: {
                        key: "d270f61c8c9fe2ef89633f4b609966de"


                    },
                    dataType: 'json',
                    success: function (result, status, xhr) {
                        $("#modalTitleH4").html(result["recipe"] ["title"]);

                        var image = result["recipe"]["image_url"];
                        

                        var resultHtml = "<p class=\"text-center\"><img src=\"" + image + "\"/></p>" ;
                        resultHtml += "<p>Ingredienti: <b>" + result["recipe"]["ingredients"] + "</b></p> ";

                        $("#modalBodyDiv").html(resultHtml)

                        $("#myModal").modal("show");
                    },
                    error: function (xhr, status, error) {
                        $("#message").html("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText)
                    }
                });
            });

            $(document).ajaxStart(function () {
                $(".imageDiv img").show();
            });

            $(document).ajaxStop(function () {
                $(".imageDiv img").hide();
            });

            function CallAPI(page) {
                $.ajax({
 url: "http://food2fork.com/api/search?q=" + $("#searchInput").val() + "",
                data: { "key": "d270f61c8c9fe2ef89633f4b609966de" },

                    dataType: "json",
                    success: function (result, status, xhr) {
                        var resultHtml = $("<div class=\"resultDiv\"><p>Ricette</p>");
                        for (i = 0; i < result["recipes"].length; i++) {

                            

                            resultHtml.append("<div text-align=\"center\"> <div class=\"result\" resourceId=\"" + result["recipes"][i]["recipe_id"] + "\">" + "<img src=\"" + result["recipes"][i]["image_url"] + "\" />" + "<p>" + result["recipes"][i]["title"] + "</p></div></div>")

                        }

                        resultHtml.append("</div>");
                        $("#message").html(resultHtml);

                      
                    },
                    error: function (xhr, status, error) {
                        $("#message").html("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText)
                    }
                });
            }

            function Validate() {
                var errorMessage = "";
                if ($("#searchInput").val() == "") {
                    errorMessage += "Attenzione! il campo e' obbligatorio";
                }
                return errorMessage;
            }

  

        });
    </script>
