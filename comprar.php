<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style_comprar.css">
    <title>Compra de Ticket</title>
</head>

<body>
    <div class="container" id="advanced-search-form">
        <h2>Compra del Ticket</h2>
        <center><form>
            <div class="form-group">
                <label for="first-name">Documento Usuario</label>
                <input type="text" class="form-control" placeholder="No. Documento" id="first-name">
            </div>
            <div class="form-group">
                <label for="first-name">Tarjeta Credito</label>
                <input type="text" class="form-control" placeholder="No. Tarjeta" id="first-name">
            </div>
            <div class="form-group">
                <label for="last-name">Obra</label>
                <select class="form-control">
                    <option disabled="">Seleccione</option>
                    <option>Romeo y Julieta</option>
                    <option>La casa de Bernarda Alba</option>
                    <option>Sueño de una noche de verano</option>
                </select>
                
            </div>
            <div class="form-group">
                <label for="country">Hora</label>
                <input type="time" class="form-control" placeholder="Hora" id="country">
            </div>
            
            
            <div class="clearfix"></div>
            <button type="submit" class="btn btn-info btn-lg btn-responsive" id="search"> Comprar</button>
        </form></center>
    </div>
</body>

</html>
