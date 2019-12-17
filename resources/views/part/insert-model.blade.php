<ul class="list-unstyled" id="payload">
    @switch($model)
        @case('User')
        <li class="m-1 bg-light p-2">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="key[]" readonly=""
                           class="form-control"
                           value="email"
                           placeholder="payload_key" required="">
                </div>
                <div class="col-md-6">
                    <input type="email" name="data[]"
                           class="form-control"
                           placeholder="is required in This Model"
                           required="">
                </div>
            </div>
        </li>
        @break
        @case('Category' || 'Product')
        <li class="m-1 bg-light p-2">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="key[]" readonly=""
                           class="form-control"
                           value="name"
                           placeholder="payload_key" required="">
                </div>
                <div class="col-md-6">
                    <input type="text" name="data[]"
                           class="form-control"
                           placeholder="is required in This Model"
                           required="">
                </div>
            </div>
        </li>
        <li class="m-1 bg-light p-2">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="key[]" readonly=""
                           class="form-control"
                           value="description"
                           placeholder="payload_key" required="">
                </div>
                <div class="col-md-6">
                    <input type="text" name="data[]"
                           class="form-control"
                           placeholder="is required in This Model"
                           required="">
                </div>
            </div>
        </li>
        <li class="m-1 bg-light p-2">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="key[]" readonly=""
                           class="form-control"
                           value="image"
                           placeholder="payload_key" required="">
                </div>
                <div class="col-md-6">
                    <input type="text" name="data[]"
                           class="form-control img-popover"
                           placeholder="is required in This Model"
                           value="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgaWQ9IkNhcGFfMSIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgNTEyIDUxMiIgaGVpZ2h0PSI1MTJweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHdpZHRoPSI1MTJweCI+PGxpbmVhckdyYWRpZW50IGlkPSJTVkdJRF8xXyIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIHgxPSIxNTIuMjkxIiB4Mj0iMzk3LjI5MSIgeTE9IjQyMi4xMDIiIHkyPSI2Ny4xMDIiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI2M3ZDNmZiIvPjxzdG9wIG9mZnNldD0iLjU5MyIgc3RvcC1jb2xvcj0iI2U3ZDhmNSIvPjxzdG9wIG9mZnNldD0iLjk5NyIgc3RvcC1jb2xvcj0iI2ZmZGJlZCIvPjwvbGluZWFyR3JhZGllbnQ+PHBhdGggZD0ibTUwMS44NzMgMTQ0Ljc1Yy0yMi4zNTctNTYuODg4LTkxLjIyNi05MS4wMDMtMTQ5LjU1Ni02OC40MjctNjYuNTgyIDI1Ljc2OS00NC41MDYgMTMxLjY3My0xMDQuOTgzIDE1My4wODgtMzIuNjY5IDExLjU2OC04MC45NjMtMzEuNjQ0LTExMy45NjktMzguMjcxLTYwLjgyMS0xMi4yMS0xMTUuODgxIDMwLjcwNS0xMjkuNDM5IDkwLjEzNS0xMy44MzIgNjAuNjMgOC4zNTMgMTQxLjYxIDc0Ljk2NyAxNTguMDY2IDc5LjM1IDE5LjYwMiAxMjAuNjgzLTUxLjcyOSAxODcuMjQ5LTcyLjIxMSA2OC4zMS0yMS4wMTkgMTQ0LjI2MyAyOC42MjIgMjAwLjgxNC0zMS43NzYgNDEuNzgtNDQuNjIxIDU3LjA1NS0xMzQuMjcyIDM0LjkxNy0xOTAuNjA0eiIgZmlsbD0idXJsKCNTVkdJRF8xXykiLz48cGF0aCBkPSJtNDMwLjE4IDQwMi42Ny0xMzcuMDQtMjAzLjI3Yy0uODkyLTEuMzI0LTIuMDMtMi4zMzQtMy4yOTEtMy4wNjJ2LTI5LjA1OWgyNC4yODJjMi40MTUgMCA0LjM3My0xLjk1OCA0LjM3My00LjM3M3YtMjMuNTQ0YzAtMi40MTUtMS45NTgtNC4zNzMtNC4zNzMtNC4zNzNoLTM2LjE1N2MtMi40MTUgMC00LjM3MyAxLjk1OC00LjM3MyA0LjM3M3YyMy41NDRjMCAyLjQxNSAxLjk1OCA0LjM3MyA0LjM3MyA0LjM3M2gxLjg3NHYyOS4wNmMtMS4yNi43MjgtMi4zOTcgMS43MzctMy4yODkgMy4wNmwtODQuMzggMTI1LjE2OS01MC41Ni03NC45OTljLS44OTQtMS4zMjQtMi4wMzMtMi4zMzQtMy4yOTUtMy4wNjJ2LTI5LjA1N2gyNC4yODJjMi40MTUgMCA0LjM3My0xLjk1OCA0LjM3My00LjM3M3YtMjMuNTQ0YzAtMi40MTUtMS45NTgtNC4zNzMtNC4zNzMtNC4zNzNoLTM2LjE1N2MtMi40MTUgMC00LjM3MyAxLjk1OC00LjM3MyA0LjM3M3YyMy41NDRjMCAyLjQxNSAxLjk1OCA0LjM3MyA0LjM3MyA0LjM3M2gxLjg3NXYyOS4wNTdjLTEuMjYyLjcyOC0yLjQwMSAxLjczNy0zLjI5NSAzLjA2MmwtMTAzLjIwOSAxNTMuMTAxYy00LjQ3IDYuNjQuMjggMTUuNTkgOC4zIDE1LjU5aDM5MS43NmM4LjAyIDAgMTIuNzctOC45NSA4LjMtMTUuNTl6IiBmaWxsPSIjMjYyNmJjIiBvcGFjaXR5PSIuMTEiLz48cGF0aCBkPSJtNDUxLjg4IDQwMC4yNmgtMjc0LjA2Yy04LjAxIDAtMTIuNzctOC45NS04LjI5LTE1LjU5bDEzNy4wMy0yMDMuMjdjMy45Ni01Ljg4IDEyLjYyLTUuODggMTYuNTggMGw5My44OSAxMzkuMjcgMTkuOCAyOS4zNyAyMy4zNSAzNC42M2M0LjQ3IDYuNjQtLjI4IDE1LjU5LTguMyAxNS41OXoiIGZpbGw9IiNmZmE4Y2YiLz48cGF0aCBkPSJtNDM2LjgzIDM1MC4wNGMtLjI5LjAzLS41OC4wNC0uODguMDRoLTg0LjkxYy01LjE1IDAtOS4zMy00LjE4LTkuMzMtOS4zM3YtMjAuMDhoNzUuMzJ6IiBmaWxsPSIjZmY3ZWI4Ii8+PHBhdGggZD0ibTM0My41NCAyMTEuNjdjLTYuMDkgOS4zOS0xNi42NyAxNS42LTI4LjY5IDE1LjZzLTIyLjYtNi4yMS0yOC42OS0xNS42bDIwLjQtMzAuMjdjMy45Ni01Ljg4IDEyLjYyLTUuODggMTYuNTggMHoiIGZpbGw9IiNmZmRiZWQiLz48cGF0aCBkPSJtMzUwLjEzMSAxNDkuMjc5aC0zNi4xNTdjLTIuNDE1IDAtNC4zNzMtMS45NTgtNC4zNzMtNC4zNzN2LTIzLjU0NGMwLTIuNDE1IDEuOTU4LTQuMzczIDQuMzczLTQuMzczaDM2LjE1N2MyLjQxNSAwIDQuMzczIDEuOTU4IDQuMzczIDQuMzczdjIzLjU0NGMwIDIuNDE1LTEuOTU4IDQuMzczLTQuMzczIDQuMzczeiIgZmlsbD0iI2ZmN2ViOCIvPjxwYXRoIGQ9Im0zNTQuNTA2IDEyMS4zNTl2MjMuNTQ2YzAgMi40MTQtMS45NTkgNC4zNzMtNC4zNzMgNC4zNzNoLTEwLjk2OGMyLjQxNCAwIDQuMzczLTEuOTU5IDQuMzczLTQuMzczdi0yMy41NDZjMC0yLjQxNC0xLjk1OS00LjM3My00LjM3My00LjM3M2gxMC45NjhjMi40MTQgMCA0LjM3MyAxLjk1OSA0LjM3MyA0LjM3M3oiIGZpbGw9IiNmZmE4Y2YiLz48cGF0aCBkPSJtMjY2LjU0IDQwMC4yNmgtMjA2LjQyYy04LjAyIDAtMTIuNzctOC45NS04LjMtMTUuNTlsMTAzLjIxLTE1My4xYzMuOTctNS44OCAxMi42Mi01Ljg4IDE2LjU5IDBsMTAzLjIxIDE1My4xYzQuNDcgNi42NC0uMjggMTUuNTktOC4yOSAxNS41OXoiIGZpbGw9IiM5N2ZmZDIiLz48cGF0aCBkPSJtMTkyLjAyIDI2MS44NGMtNi4wOSA5LjM5LTE2LjY3IDE1LjYtMjguNjkgMTUuNi0xMi4wNCAwLTIyLjYyLTYuMjEtMjguNy0xNS42MWwyMC40LTMwLjI2YzMuOTctNS44OCAxMi42Mi01Ljg4IDE2LjU5IDB6IiBmaWxsPSIjZGNmZGVlIi8+PHBhdGggZD0ibTE5OC42MDcgMTk5LjQ1MWgtMzYuMTU3Yy0yLjQxNSAwLTQuMzczLTEuOTU4LTQuMzczLTQuMzczdi0yMy41NDRjMC0yLjQxNSAxLjk1OC00LjM3MyA0LjM3My00LjM3M2gzNi4xNTdjMi40MTUgMCA0LjM3MyAxLjk1OCA0LjM3MyA0LjM3M3YyMy41NDRjLjAwMSAyLjQxNS0xLjk1NyA0LjM3My00LjM3MyA0LjM3M3oiIGZpbGw9IiNmZjdlYjgiLz48cGF0aCBkPSJtMjAyLjk4MiAxNzEuNTMxdjIzLjU0NmMwIDIuNDE0LTEuOTU5IDQuMzczLTQuMzczIDQuMzczaC0xMC45NjhjMi40MTQgMCA0LjM3My0xLjk1OSA0LjM3My00LjM3M3YtMjMuNTQ2YzAtMi40MTQtMS45NTktNC4zNzMtNC4zNzMtNC4zNzNoMTAuOTY4YzIuNDE0IDAgNC4zNzMgMS45NTkgNC4zNzMgNC4zNzN6IiBmaWxsPSIjZmZhOGNmIi8+PHBhdGggZD0ibTQ0NS4yODEgMjU0LjA5OHY2OS4wNWMwIDUuMTUtNC4xOCA5LjMzLTkuMzMgOS4zM2gtODQuOTFjLTUuMTUgMC05LjMzLTQuMTgtOS4zMy05LjMzdi02OS4wNWMwLTUuMTUgNC4xOC05LjMzIDkuMzMtOS4zM2g4NC45MWM1LjE1IDAgOS4zMyA0LjE4IDkuMzMgOS4zM3oiIGZpbGw9IiM5N2ZmZDIiLz48cGF0aCBkPSJtMzgyLjkyMiAyNzQuMDg3aC0xNi43MDdjLTIuNzYyIDAtNS0yLjIzOS01LTVzMi4yMzgtNSA1LTVoMTYuNzA3YzIuNzYyIDAgNSAyLjIzOSA1IDVzLTIuMjM4IDUtNSA1eiIgZmlsbD0iI2ZmZiIvPjxwYXRoIGQ9Im00NDUuMjgxIDI1NC4wOTh2NjkuMDVjMCA1LjE1LTQuMTggOS4zMy05LjMzIDkuMzNoLTE2LjRjNS4xNSAwIDkuMzMtNC4xOCA5LjMzLTkuMzN2LTY5LjA1YzAtNS4xNS00LjE4LTkuMzMtOS4zMy05LjMzaDE2LjRjNS4xNSAwIDkuMzMgNC4xOCA5LjMzIDkuMzN6IiBmaWxsPSIjZGNmZGVlIi8+PHBhdGggZD0ibTQ0NS4yODEgMjcyLjE3OHY1MC45N2MwIDUuMTUtNC4xOCA5LjMzLTkuMzMgOS4zM2gtODQuOTFjLTUuMTUgMC05LjMzLTQuMTgtOS4zMy05LjMzdi0xNS42NWgxNy42YzIuNjUgMCA1LjItMS4wNSA3LjA3LTIuOTNsMTMuMjgtMTMuMjhjMS44OC0xLjg3IDQuNDItMi45MyA3LjA4LTIuOTNoMzguMjJjMS4zNiAwIDIuNjktLjI4IDMuOTItLjggMS4xNy0uNSAyLjI0LTEuMjEgMy4xNS0yLjEzeiIgZmlsbD0iIzgzOTlmZSIvPjxwYXRoIGQ9Im00NDUuMjgxIDI3Mi4xNzh2NTAuOTdjMCA1LjE1LTQuMTggOS4zMy05LjMzIDkuMzNoLTE2LjRjNS4xNSAwIDkuMzMtNC4xOCA5LjMzLTkuMzN2LTM1LjU5YzEuMTctLjUgMi4yNC0xLjIxIDMuMTUtMi4xM3oiIGZpbGw9IiM5ZmIwZmUiLz48cGF0aCBkPSJtMzg1LjI1NCAyMjEuNjg5Yy0zLjczOSAwLTcuNDc5LTEuNDIzLTEwLjMyNi00LjI3LTUuNjkzLTUuNjk0LTUuNjkzLTE0Ljk1OCAwLTIwLjY1MnMxNC45NTgtNS42OTMgMjAuNjUxIDBjMi43NTggMi43NTggNC4yNzcgNi40MjUgNC4yNzcgMTAuMzI2cy0xLjUxOSA3LjU2OC00LjI3NyAxMC4zMjZjLTIuODQ2IDIuODQ3LTYuNTg2IDQuMjctMTAuMzI1IDQuMjd6bTAtMTkuMTk3Yy0xLjE3OSAwLTIuMzU3LjQ0OS0zLjI1NCAxLjM0Ni0xLjc5NCAxLjc5NC0xLjc5NCA0LjcxNSAwIDYuNTEgMS43OTQgMS43OTQgNC43MTQgMS43OTQgNi41MDkgMCAuODctLjg3IDEuMzQ5LTIuMDI1IDEuMzQ5LTMuMjU1cy0uNDc5LTIuMzg1LTEuMzQ4LTMuMjU0Yy0uODk5LS44OTgtMi4wNzctMS4zNDctMy4yNTYtMS4zNDd6IiBmaWxsPSIjODM5OWZlIi8+PHBhdGggZD0ibTQxMi4wNjcgMTY3LjE2NWMtMy43NCAwLTcuNDc5LTEuNDIzLTEwLjMyNi00LjI3LTUuNjkzLTUuNjk0LTUuNjkzLTE0Ljk1OCAwLTIwLjY1MiA1LjY5NC01LjY5NCAxNC45NTgtNS42OTMgMjAuNjUxIDAgNS42OTQgNS42OTMgNS42OTQgMTQuOTU4IDAgMjAuNjUxLTIuODQ2IDIuODQ3LTYuNTg1IDQuMjcxLTEwLjMyNSA0LjI3MXptNi43OTEtNy44MDZoLjAxem0tNi43OTEtMTEuMzkxYy0xLjE3OSAwLTIuMzU3LjQ0OS0zLjI1NCAxLjM0Ni0xLjc5NCAxLjc5NC0xLjc5NCA0LjcxNSAwIDYuNTEgMS43OTQgMS43OTQgNC43MTQgMS43OTQgNi41MDkgMCAxLjc5NC0xLjc5NSAxLjc5NC00LjcxNSAwLTYuNTA5LS44OTctLjg5OC0yLjA3Ni0xLjM0Ny0zLjI1NS0xLjM0N3oiIGZpbGw9IiMwMWVjYTUiLz48cGF0aCBkPSJtMjY3LjM5MyAxNTUuNTY5aC0zLjI1di0zLjI1YzAtMi43NjEtMi4yMzktNS01LTVzLTUgMi4yMzktNSA1djMuMjVoLTMuMjVjLTIuNzYxIDAtNSAyLjIzOS01IDVzMi4yMzkgNSA1IDVoMy4yNXYzLjI1YzAgMi43NjEgMi4yMzkgNSA1IDVzNS0yLjIzOSA1LTV2LTMuMjVoMy4yNWMyLjc2MSAwIDUtMi4yMzkgNS01cy0yLjIzOS01LTUtNXoiIGZpbGw9IiNmZjdlYjgiLz48cGF0aCBkPSJtNDMgMzI4LjE2MWgtMy4yNXYtMy4yNWMwLTIuNzYxLTIuMjM5LTUtNS01cy01IDIuMjM5LTUgNXYzLjI1aC0zLjI1Yy0yLjc2MSAwLTUgMi4yMzktNSA1czIuMjM5IDUgNSA1aDMuMjV2My4yNWMwIDIuNzYxIDIuMjM5IDUgNSA1czUtMi4yMzkgNS01di0zLjI1aDMuMjVjMi43NjEgMCA1LTIuMjM5IDUtNXMtMi4yMzktNS01LTV6IiBmaWxsPSIjZmY3ZWI4Ii8+PHBhdGggZD0ibTQ5MC4yMTYgMzU1LjA2MmgtMy4yNXYtMy4yNWMwLTIuNzYxLTIuMjM5LTUtNS01cy01IDIuMjM5LTUgNXYzLjI1aC0zLjI1Yy0yLjc2MSAwLTUgMi4yMzktNSA1czIuMjM5IDUgNSA1aDMuMjV2My4yNWMwIDIuNzYxIDIuMjM5IDUgNSA1czUtMi4yMzkgNS01di0zLjI1aDMuMjVjMi43NjEgMCA1LTIuMjM5IDUtNXMtMi4yMzktNS01LTV6IiBmaWxsPSIjMDFlY2E1Ii8+PHBhdGggZD0ibTQ2NC4zMjMgMzgxLjg3NC0yOS45MzItNDQuMzk5aDEuNTYxYzcuOTAyIDAgMTQuMzMxLTYuNDI5IDE0LjMzMS0xNC4zMzF2LTY5LjA0NmMwLTcuOTAyLTYuNDI5LTE0LjMzMS0xNC4zMzEtMTQuMzMxaC02Ny40M2wtNDEuMjMyLTYxLjE2MmMtMS44MjYtMi43MDktNC40NDktNC42OTctNy40NC01Ljc1NHYtMTguNTc0aDMwLjI4MmM1LjE2OCAwIDkuMzc0LTQuMjA1IDkuMzc0LTkuMzc0di0yMy41NDRjMC01LjE2OC00LjIwNS05LjM3NC05LjM3NC05LjM3NGgtMzAuMjgydi0uMjQ4YzAtMi43NjEtMi4yMzktNS01LTVzLTUgMi4yMzktNSA1djEuMjE4Yy0zLjEwMyAxLjUzLTUuMjQ4IDQuNzE3LTUuMjQ4IDguNDA0djIzLjU0NGMwIDMuNjg3IDIuMTQ1IDYuODc0IDUuMjQ4IDguNDA0djE5LjU0NWMtMi45OSAxLjA1Ny01LjYxIDMuMDQ1LTcuNDM1IDUuNzUybC04MC4yMzcgMTE5LjAxOS0xNC44ODYtMjIuMDgxYy0xLjU0NC0yLjI5LTQuNjUyLTIuODk1LTYuOTQxLTEuMzUxLTIuMjkgMS41NDQtMi44OTUgNC42NTEtMS4zNTEgNi45NDFsNzEuNjgyIDEwNi4zMjljMS41MTYgMi4yNDguNjkzIDQuMzQ1LjI2OSA1LjE0M3MtMS43MDMgMi42NTItNC40MTUgMi42NTJoLTIwNi40MjFjLTIuNzExIDAtMy45OS0xLjg1NC00LjQxNS0yLjY1Mi0uNDI0LS43OTctMS4yNDctMi44OTUuMjY5LTUuMTQzbDEwMy4yMS0xNTMuMDk2Yy45NDUtMS40MDEgMi40NTYtMi4yMDUgNC4xNDYtMi4yMDVzMy4yMDEuODA0IDQuMTQ2IDIuMjA1bDE1Ljg1MiAyMy41MTRjMS41NDMgMi4yOSA0LjY1IDIuODkzIDYuOTQxIDEuMzUxIDIuMjktMS41NDQgMi44OTUtNC42NTEgMS4zNTEtNi45NDFsLTE1Ljg1Mi0yMy41MTRjLTEuODI2LTIuNzA4LTQuNDQ3LTQuNjk2LTcuNDM4LTUuNzUzdi0xOC41NzVoMzAuMjgyYzUuMTY4IDAgOS4zNzMtNC4yMDUgOS4zNzMtOS4zNzR2LTIzLjU0NGMwLTUuMTY4LTQuMjA1LTkuMzczLTkuMzczLTkuMzczaC0zMC4yODJ2LS4yNDhjMC0yLjc2MS0yLjIzOS01LTUtNXMtNSAyLjIzOS01IDV2MS4yMThjLTMuMTAzIDEuNTMtNS4yNDggNC43MTctNS4yNDggOC40MDR2MjMuNTQ0YzAgMy42ODcgMi4xNDUgNi44NzQgNS4yNDggOC40MDR2MTkuNTQ0Yy0yLjk5MSAxLjA1Ny01LjYxMiAzLjA0NS03LjQzOCA1Ljc1M2wtMTAzLjIxIDE1My4wOTljLTMuMTA3IDQuNjA5LTMuNDE2IDEwLjUyMS0uODA1IDE1LjQyOSAyLjYxIDQuOTA3IDcuNjg1IDcuOTU2IDEzLjI0MyA3Ljk1NmgzOTEuNzdjNS41NTkgMCAxMC42MzMtMy4wNDkgMTMuMjQzLTcuOTU2IDIuNjEtNC45MDggMi4zMDItMTAuODItLjgwNS0xNS40Mjl6bS0yNjYuMzQzLTE4Ny40MjNoLTM0LjkwM3YtMjIuMjkxaDM0LjkwM3ptMjM3Ljk3MiA1NS4zMTdjMi4zODggMCA0LjMzMSAxLjk0MyA0LjMzMSA0LjMzMXYxNi4wMDdsLTExLjgwNiAxMS44MDZjLS40MzUuNDM5LS45NTkuNzkyLTEuNTQzIDEuMDQxLS42MzYuMjctMS4zLjQwNi0xLjk3My40MDZoLTM4LjIyYy0zLjk5NyAwLTcuNzYzIDEuNTU3LTEwLjYxNiA0LjM5NGwtMTMuMjg5IDEzLjI5Yy0uOTIuOTI1LTIuMjA2IDEuNDU2LTMuNTI1IDEuNDU2aC0xMi41OTd2LTQ4LjM5OWMwLTIuMzg4IDEuOTQzLTQuMzMxIDQuMzMxLTQuMzMxaDg0LjkwN3ptLTg2LjQ0OC0xMDUuNDg5aC0zNC45MDN2LTIyLjI5MWgzNC45MDN6bS0xMi43OTEgMTc4Ljg2NmMwIDcuOTAyIDYuNDI5IDE0LjMzMSAxNC4zMzEgMTQuMzMxaDMzLjEwNmMyLjc2MSAwIDUtMi4yMzkgNS01cy0yLjIzOS01LTUtNWgtMzMuMTA2Yy0yLjM4OCAwLTQuMzMxLTEuOTQzLTQuMzMxLTQuMzMxdi0xMC42NDZoMTIuNTk3YzMuOTYyIDAgNy44MzEtMS42MDUgMTAuNjA2LTQuMzk0bDEzLjI3LTEzLjI3MWMuOTU2LS45NTEgMi4yMTktMS40NzUgMy41NTQtMS40NzVoMzguMjJjMi4wMTggMCAzLjk5Mi0uNDAyIDUuODg1LTEuMjAzIDEuNzk2LS43NjggMy4zOTEtMS44NDggNC43MjEtMy4xOTJsNC43MTYtNC43MTZ2MzguODk2YzAgMi4zODgtMS45NDMgNC4zMzEtNC4zMzEgNC4zMzFoLTIzLjcwMWMtMi43NjEgMC01IDIuMjM5LTUgNXMyLjIzOSA1IDUgNWgxMC4wOGwzMy43IDQ5Ljk4OWMxLjUxNiAyLjI0OC42OTMgNC4zNDUuMjY5IDUuMTQzcy0xLjcwMyAyLjY1Mi00LjQxNSAyLjY1MmgtMTcxLjIxYzEuNTc1LTQuNDQyLjk4Ni05LjM5OS0xLjcwMS0xMy4zODVsLTUwLjc2Ni03NS4zMDQgODIuNDk5LTEyMi4zNzRjLjk0NS0xLjQwMSAyLjQ1Ni0yLjIwNSA0LjE0Ni0yLjIwNXMzLjIwMS44MDQgNC4xNDYgMi4yMDVsMzcuNDY0IDU1LjU3MmgtNS40MTdjLTcuOTAyIDAtMTQuMzMxIDYuNDI5LTE0LjMzMSAxNC4zMzF2NjkuMDQ2eiIgZmlsbD0iIzI2MjZiYyIvPjxwYXRoIGQ9Im0xMzEuNjIzIDM4MC43MTVoLTE4LjYyM2MtMi43NjEgMC01LTIuMjM5LTUtNXMyLjIzOS01IDUtNWgxOC42MjNjMS4zMTYgMCAyLjYwNC0uNTM0IDMuNTM1LTEuNDY0bDIxLjYzNC0yMS42MzRjMi44MzMtMi44MzMgNi42LTQuMzk0IDEwLjYwNy00LjM5NGg5OC45N2MxLjMxNiAwIDIuNjA0LS41MzQgMy41MzUtMS40NjRsMTIuODY0LTEyLjg2NGMyLjgzMy0yLjgzMyA2LjYtNC4zOTQgMTAuNjA3LTQuMzk0aDEzLjg1NGM0LjAwNyAwIDcuNzczIDEuNTYxIDEwLjYwNyA0LjM5NGwzNC4zNDkgMzQuMzQ5Yy45NDQuOTQ0IDIuMiAxLjQ2NCAzLjUzNSAxLjQ2NGgyNi4wMjRjMi43NjEgMCA1IDIuMjM5IDUgNXMtMi4yMzkgNS01IDVoLTI2LjAyNGMtNC4wMDYgMC03Ljc3Mi0xLjU2LTEwLjYwNi00LjM5M2wtMzQuMzQ5LTM0LjM0OWMtLjk0NC0uOTQ1LTIuMi0xLjQ2NS0zLjUzNi0xLjQ2NWgtMTMuODU0Yy0xLjMzNSAwLTIuNTkxLjUyLTMuNTM2IDEuNDY1bC0xMi44NjQgMTIuODY0Yy0yLjgzMyAyLjgzMy02LjYgNC4zOTMtMTAuNjA2IDQuMzkzaC05OC45N2MtMS4zMzUgMC0yLjU5MS41Mi0zLjUzNiAxLjQ2NWwtMjEuNjM0IDIxLjYzNGMtMi44MzMgMi44MzMtNi41OTkgNC4zOTMtMTAuNjA2IDQuMzkzeiIgZmlsbD0iI2ZmN2ViOCIvPjxwYXRoIGQ9Im0zMzYuNzEgMzAyLjU0djEwaC02My4yNGMtMS4zMiAwLTIuNjEuNTMtMy41NCAxLjQ2bC0xNS42OSAxNS42OWMtMi44MyAyLjgzLTYuNiA0LjM5LTEwLjYgNC4zOWgtMzguMjNjLTEuMzMgMC0yLjU5LjUyLTMuNTMgMS40N2wtMTMuMjkgMTMuMjhjLTIuODMgMi44My02LjYgNC4zOS0xMC42IDQuMzloLTY2LjM3Yy0yLjc2IDAtNS0yLjI0LTUtNXMyLjI0LTUgNS01aDY2LjM3YzEuMzMgMCAyLjU5LS41MiAzLjUzLTEuNDZsMTMuMjgtMTMuMjhjMi44NC0yLjg0IDYuNi00LjQgMTAuNjEtNC40aDM4LjIzYzEuMzMgMCAyLjU5LS41MiAzLjUzLTEuNDZsMTUuNjktMTUuNjljMi44NC0yLjgzIDYuNi00LjM5IDEwLjYxLTQuMzl6IiBmaWxsPSIjMDFlY2E1Ii8+PHBhdGggZD0ibTEwNS4wNzcgMjcyLjg4OGgtMjQuNDM3Yy0yLjc2MSAwLTUgMi4yMzktNSA1IDAgMi43NjEgMi4yMzkgNSA1IDVoMjQuNDM4YzIuNzYxIDAgNS0yLjIzOSA1LTUtLjAwMS0yLjc2MS0yLjIzOS01LTUuMDAxLTV6IiBmaWxsPSIjOTdmZmQyIi8+PGcgZmlsbD0iI2ZmZiI+PHBhdGggZD0ibTE1My4wNzcgMjkwLjU1NWgtNzIuNDM3Yy0yLjc2MSAwLTUgMi4yMzktNSA1IDAgMi43NjEgMi4yMzkgNSA1IDVoNzIuNDM4YzIuNzYxIDAgNS0yLjIzOSA1LTUtLjAwMS0yLjc2Mi0yLjIzOS01LTUuMDAxLTV6Ii8+PHBhdGggZD0ibTE1My4wNzcgMzA4LjIyMWgtNzIuNDM3Yy0yLjc2MSAwLTUgMi4yMzktNSA1IDAgMi43NjEgMi4yMzkgNSA1IDVoNzIuNDM4YzIuNzYxIDAgNS0yLjIzOSA1LTUtLjAwMS0yLjc2MS0yLjIzOS01LTUuMDAxLTV6Ii8+PC9nPjwvc3ZnPgo="
                           required="">
                </div>
            </div>
        </li>
        @break
        @case('Product')
        <li class="m-1 bg-light p-2">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="key[]" readonly=""
                           class="form-control"
                           value="name"
                           placeholder="payload_key" required="">
                </div>
                <div class="col-md-6">
                    <input type="text" name="data[]"
                           class="form-control"
                           placeholder="is required in This Model"
                           required="">
                </div>
            </div>
        </li>
        <li class="m-1 bg-light p-2">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="key[]" readonly=""
                           class="form-control"
                           value="name"
                           placeholder="payload_key" required="">
                </div>
                <div class="col-md-6">
                    <input type="text" name="data[]"
                           class="form-control"
                           placeholder="is required in This Model"
                           required="">
                </div>
            </div>
        </li>
        @break
        @default
        <li class="m-1 bg-light p-2">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="key[]"
                           class="form-control"
                           placeholder="payload_key" required="">
                </div>
                <div class="col-md-6">
                    <input type="text" name="data[]"
                           class="form-control"
                           placeholder="Payload data" required="">
                </div>
            </div>
        </li>
    @endswitch
</ul>
