const zoomininteraction = new ol.interaction.DragBox();
zoomininteraction.on('boxend', function () {
    const zoominExtent = zoomininteraction.getGeometry().getExtent();
    map.getView().fit(zoominExtent);
});

const mapElement = document.getElementById("map");

function resetCursor() {
    mapElement.style.cursor = "auto";
    map.removeInteraction(zoomininteraction);
}

map.on('moveend', resetCursor);

const ziButton = document.getElementById('ziButton');
ziButton.addEventListener('click', (event) => {
    event.preventDefault();
    mapElement.style.cursor = "zoom-in";
    map.addInteraction(zoomininteraction);
});

const dims = {
    a0: [1189, 841],
    a1: [841, 594],
    a2: [594, 420],
    a3: [420, 297],
    a4: [297, 210],
    a5: [210, 148],
};



document.getElementById('print-map-btn').addEventListener('click', function () {
    var printModal = new bootstrap.Modal(document.getElementById('printModal'), {});
    printModal.show();
});

document.getElementById('ziButton').addEventListener('click', function () {
    // Implement the logic for selecting the area
});

document.getElementById('export-pdf').addEventListener('click', function () {
    var format = document.getElementById('format').value;
    var resolution = document.getElementById('resolution').value;
    
    var exportButton = document.getElementById('export-pdf');
    exportButton.disabled = true;
    document.body.style.cursor = 'progress';

    const dim = {
        a0: [1189, 841],
        a1: [841, 594],
        a2: [594, 420],
        a3: [420, 297],
        a4: [297, 210],
        a5: [210, 148],
    };

    const mapCanvasWidth = Math.round((dim[format][0] * 0.7 * resolution) / 25.4);
    const mapCanvasHeight = Math.round((dim[format][1] * resolution) / 25.4);
    const headerHeight = 70;
    const legendWidth = dim[format][0] * 0.3 * resolution / 25.4;

    const size = map.getSize();
    const viewResolution = map.getView().getResolution();

    map.once('rendercomplete', function () {
        const mapCanvas = document.createElement('canvas');
        mapCanvas.width = mapCanvasWidth;
        mapCanvas.height = mapCanvasHeight;
        const mapContext = mapCanvas.getContext('2d');

        Array.prototype.forEach.call(document.querySelectorAll('.ol-layer canvas'), function (canvas) {
            if (canvas.width > 0) {
                const opacity = canvas.parentNode.style.opacity;
                mapContext.globalAlpha = opacity === '' ? 1 : Number(opacity);
                const transform = canvas.style.transform;
                const matrix = transform.match(/^matrix\(([^\(]*)\)$/)[1].split(',').map(Number);
                CanvasRenderingContext2D.prototype.setTransform.apply(mapContext, matrix);
                mapContext.drawImage(canvas, 0, 0);
            }
        });

        mapContext.globalAlpha = 1;
        mapContext.setTransform(1, 0, 0, 1, 0, 0);

        const headerCanvas = document.createElement('canvas');
        headerCanvas.width = dim[format][0] * resolution / 25.4;
        headerCanvas.height = headerHeight;
        const headerContext = headerCanvas.getContext('2d');
        headerContext.fillStyle = "white";
        headerContext.fillRect(0, 0, headerCanvas.width, headerCanvas.height);

        const logoImg = new Image();
        logoImg.src = './img/assac.png'; 
        logoImg.onload = function () {
            const logoWidth = 40;
            const logoHeight = 40;
            const logoX = 10;
            const logoY = (headerHeight - logoHeight) / 2;
            headerContext.drawImage(logoImg, logoX, logoY, logoWidth, logoHeight);


            headerContext.font = "20px Arial";
            headerContext.fillStyle = "black";
            const text = "Assam State Space Application Centre";
            const textX = logoX + logoWidth + 10;
            const textY = headerHeight / 2 + 7;
            headerContext.fillText(text, textX, textY);

            const fullCanvas = document.createElement('canvas');
            fullCanvas.width = dim[format][0] * resolution / 25.4;
            fullCanvas.height = mapCanvasHeight + headerHeight;
            const fullContext = fullCanvas.getContext('2d');
            fullContext.fillStyle = "white";
            fullContext.fillRect(0, 0, fullCanvas.width, fullCanvas.height);

            fullContext.lineWidth = 4;
            fullContext.strokeRect(0, 0, fullCanvas.width, fullCanvas.height);

            fullContext.drawImage(headerCanvas, 0, 0);
            fullContext.drawImage(mapCanvas, 0, headerHeight, mapCanvasWidth, mapCanvasHeight);

            const legendCanvas = document.createElement('canvas');
            legendCanvas.width = legendWidth;
            legendCanvas.height = mapCanvasHeight;
            const legendContext = legendCanvas.getContext('2d');

            legendContext.fillStyle = "white";
            legendContext.fillRect(0, 0, legendCanvas.width, legendCanvas.height);
            legendContext.strokeStyle = "black";
            legendContext.strokeRect(0, 0, legendCanvas.width, legendCanvas.height);
            legendContext.font = "16px Arial";
            legendContext.fillStyle = "black";
            legendContext.fillText("Legend", 10, 30);

            fullContext.drawImage(legendCanvas, mapCanvasWidth, headerHeight);

            const pdf = new jspdf.jsPDF('landscape', undefined, format);
            pdf.addImage(fullCanvas.toDataURL('image/jpeg'), 'JPEG', 0, 0, dim[format][0], dim[format][1]);
            pdf.save('map.pdf');

            map.setSize(size);
            map.getView().setResolution(viewResolution);
            exportButton.disabled = false;
            document.body.style.cursor = 'auto';

            var printModal = bootstrap.Modal.getInstance(document.getElementById('printModal'));
            printModal.hide();
        };

        logoImg.onerror = function () {
            console.error('Error loading logo image:', logoImg.src);
            map.setSize(size);
            map.getView().setResolution(viewResolution);
            exportButton.disabled = false;
            document.body.style.cursor = 'auto';


            var printModal = bootstrap.Modal.getInstance(document.getElementById('printModal'));
            printModal.hide();
        };

        logoImg.onerror = function () {
            console.error('Error loading logo image:', logoImg.src);
            map.setSize(size);
            map.getView().setResolution(viewResolution);
            exportButton.disabled = false;
            document.body.style.cursor = 'auto';

            var printModal = bootstrap.Modal.getInstance(document.getElementById('printModal'));
            printModal.hide();
        };
    });

    const printSize = [mapCanvasWidth, mapCanvasHeight];
    map.setSize(printSize);
    const scaling = Math.min(mapCanvasWidth / size[0], mapCanvasHeight / size[1]);
    map.getView().setResolution(viewResolution / scaling);
});

