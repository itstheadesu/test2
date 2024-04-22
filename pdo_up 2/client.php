<div class="container mt-3">
    <div class="form-group">
        <label>Name:</label>
        <input type="text" class="form-control" name="name" id="nameField" pattern="^[a-zA-Z\s\u00D1\u00F1]+$">
    </div>
    
    <div class="form-group">
        <div class="row">
            <div class="col-md-2">
                <label>Client Type:</label>
            </div>

            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="client_type" value="Citizen" required>
                    <label class="form-check-label" for="clientTypeCitizen">Citizen</label>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="client_type" value="Business">
                    <label class="form-check-label" for="clientTypeBusiness">Business</label>
                </div>
            </div>
        
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="client_type" value="Government">
                    <label class="form-check-label" for="clientTypeGovernment">Government</label>
                </div>
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Date:</label>
                    <input type="date" class="form-control" name="date" id="date" required readonly>
                    </div>
                </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Sex:</label>
                    <select class="form-control" name="sex" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="form-group">
                    <label>Age:</label>
                    <input type="number" class="form-control" name="age" min="18" max="99" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Region of Residence:</label>
                    <input type="text" class="form-control" name="region" required>
                </div>
            </div>
    
            <div class="col-md-6">
                <div class="form-group">
                    <label>Service Availed:</label>
                    <input type="text" class="form-control" name="service" required>
                </div>
            </div>
        </div>

</div>