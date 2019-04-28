<?php

class uitvaartcentraTable
{

    public function loadTable($centras)
    {
        $html = $this->generateHead();
        $html .= $this->generateBody($centras);
        $html .= $this->generateFoot();
        $html .= $this->generateEditModal();
        $html .= $this->generateDeleteModal();

        return $html;
    }

    private function generateHead()
    {
        return '<div class=" container ">
        <table class="table" id="uitvaartcentraTable">
            <thead>
                    <th style="width: 25%">uitvaartcentrum</th>
                    <th style="width: 15%">straat</th>
                    <th style="width: 8%">huisnummer</th>
                    <th style="width: 10%">plaats</th>
                    <th style="width: 10%">bezorgen</th>
                    <th style="width: 30%">opmerking</th>
                    <th style="width: 1%"></th>
                    <th style="width: 1%"></th>
            </thead>';
    }

    private function generateBody($centras)
    {
        $html = "";
        $candeliver = "";

        $html .= "<tbody>";
        foreach ($centras as $entry) {
            if ($entry["can_deliver"]) {
                $html .= '<tr class="table-success">';
                $candeliver = "ja";
            } else {
                $html .= '<tr class="table-danger">';
                $candeliver = "nee";
            }


            $html .= '
                <td class="uitvaartcentrum">' . $entry["name"] . '</td>
                <td class="straat">' . $entry["street"] . '</td>
                <td class="huisnummer">' . $entry["houseNumber"] . '</td>
                <td class="plaats">' . $entry["city"] . '</td>
                <td class="font-weight-bold bezorging">' . $candeliver . '</td>
                <td class="opmerking">' . $entry["comment"] . '</td>
                <td><button onclick="displayEditModal(' . $entry["id"] . ')" type="button" class="btn btn-default p-0 edit" id="' . $entry["id"] . '"><i class="material-icons text-primary">edit</i></button></td>
                <td><button onclick="displayDeleteModal(' . $entry["id"] . ')" type="button" class="btn btn-default p-0 delete" id="' . $entry["id"] . '"><i class="material-icons text-primary">delete</i></button></td>

            </tr>
            ';
        }

        return $html;
    }

    private function generateFoot()
    {
        return '</tbody>
        </table>
    </div>';
    }

    private function generateEditModal()
    {
        return '
        <div class="modal fade" id="editModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
        
                    <form method="post" action="" name="editcentra">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Uitvaartcetra wijzigen</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
        
                        <!-- Modal body -->
                        <div class="modal-body form-group">
                            <label class="mt-3" for="uitvaartcentrumInput">uitvaartcentrum</label>
                            <input type="text" class="form-control uitvaartcentrum" id="uitvaartcentrumInput" name="uitvaartcentrum" required="true">
                            <div class="row">
                                <div class="col-8">
                                    <label class="mt-3" for="straatInput">straat</label>
                                    <input type="text" class="form-control straat" id="straatInput" name="straat" required="true">
                                </div>
                                <div class="col-4">
                                    <label class="mt-3" for="huisnummerInput">huisnummer</label>
                                    <input type="text" class="form-control huisnummer" id="huisnummerInput" name="huisnummer" required="true">
                                </div>
                            </div>
                            <label class="mt-3" for="plaatsInput">plaats</label>
                            <input type="text" class="form-control plaats" id="plaatsInput" name="plaats" required="true">
        
                            <label class="mt-3" for="bezorgingInput">bezorging</label>
                            <div class="custom-control custom-radio" id="bezorgingInput">
                                <input type="radio" id="ja" name="bezorging" class="custom-control-input bezorging" name="bezorging">
                                <label class="custom-control-label" for="customRadio1">Ja</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="nee" name="bezorging" class="custom-control-input bezorging" name="bezorging">
                                <label class="custom-control-label" for="customRadio2">Nee</label>
                            </div>
                            <label class="mt-3" for="opmerkingInput">opmerking</label>
                            <textarea type="text" class="form-control opmerking" id="opmerkingInput" style="height: 70px;" name="opmerking"></textarea>
                        </div>
        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">sluiten</button>
                            <button type="submit" class="btn btn-success" id="editcentraBtn" name="editcentraBtn">wijzigen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        ';
    }

    private function generateDeleteModal()
    {
        return '
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Verwijderen?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <span>Weet je zeker dat je </span><span class="uitvaartcentrumdel">uitvaartcentrum</span><span> uit </span><span class="plaatsdel">plaats</span><span> wilt verwijderen?</span>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">annuleren</button>
              <form method="post" action="" name="deletecentra"><button type="submit" class="btn btn-primary" name="deletecentraBtn">verwijderen</button></form>
            </div>
          </div>
        </div>
      </div>';
    }
}