
var newwindow = ''
function popitup(url) {
if (newwindow.location && !newwindow.closed) {
    newwindow.location.href = url;
    newwindow.focus(); }
else {
    newwindow=window.open(url,'htmlname','width=404,height=316,resizable=1');}
}
function tidy() {
if (newwindow.location && !newwindow.closed) {
   newwindow.close(); }
}
