<style>
body{
    margin: 0 !important;
}

#pdfPreview{
    width: 100%;
    height: 100%;
    border: none;
}

</style>
<body>
    <iframe src ="{{asset($customer->pdf)}}" id="pdfPreview"></iframe>
</body>