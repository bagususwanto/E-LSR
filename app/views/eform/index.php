<aside id="sidebar" class="sidebar">
    <button id="printButton" type="button" class="btn btn-secondary" style="width: 100%;"><i
            class="bi bi-printer-fill"></i>
        PRINT</button>
</aside>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Eform</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASEURL; ?>">Home</a></li>
                <li class="breadcrumb-item active">Eform</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card ">
                            <div class="card-header bg-transparent mb-3">
                                LSR Report
                            </div>
                            <div class="row card-body">
                                <div class="col-12" id="eFormReport">
                                    <table class="table table-bordered border-dark table-responsive table-sm">
                                        <thead>
                                            <tr class="text-center fw-bold fs-6">
                                                <td rowspan="2" colspan="7">PT. TOYOTA MOTOR MANUFACTURING INDONESIA
                                                    <br> NEW ENGINE
                                                    PLANT KARAWANG
                                                </td>
                                                <td colspan="7">LINE SUPPLY REQUEST <br>
                                                    <?php echo strtoupper($data['dataLsr']['line_lsr']); ?></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center fw-semibold">
                                                <th class="align-middle text-center">SECT.</th>
                                                <th class="align-middle text-center">TYPE</th>
                                                <th class="align-middle text-center">LINE NO.</th>
                                                <th class="align-middle text-center" colspan="2">SHIPING REQUEST NO.
                                                </th>
                                                <th class="align-middle text-center" width="6%">MODEL</th>
                                                <th class="align-middle text-center" width="6%">MODULE NO.</th>
                                                <th class="align-middle text-center" width="6%">CASE</th>
                                                <th class="align-middle text-center" colspan="4">COST CENTER
                                                </th>
                                                <td class="text-start" rowspan="2" colspan="5">
                                                    <p class="text-center text-decoration-underline">REPAIR CODE</p>
                                                    <p>0: Unrepairable</p>
                                                    <p>1: Plant Repair</p>
                                                    <p>6: Unrepairable caused by other parts</p>
                                                </td>
                                            </tr>
                                            <tr class="align-middle text-center">
                                                <td class="align-middle text-center"></td>
                                                <td class="align-middle text-center"></td>
                                                <td class="align-middle text-center">
                                                    <?php echo $data['dataLsr']['line_code']; ?>
                                                </td>
                                                <td class="align-middle text-center" colspan="2"></td>
                                                <td class="align-middle text-center"></td>
                                                <td class="align-middle text-center"></td>
                                                <td class="align-middle text-center"></td>
                                                <td class="align-middle text-center" colspan="4">
                                                    <?php echo $data['dataLsr']['cost_center']; ?>
                                                </td>
                                            </tr>
                                            <tr class="text-center fw-semibold">
                                                <th class="align-middle text-center" rowspan="2">RUN NO.</th>
                                                <th colspan="2">FACT.</th>
                                                <th class="align-middle text-center" rowspan="2">REPAIR</th>
                                                <th class="align-middle text-center" rowspan="2">SOURCHING</th>
                                                <th class="align-middle text-center" rowspan="2" colspan="4">CONTENT
                                                    PART NO.</th>
                                                <th class="align-middle text-center" rowspan="2">COLOUR</th>
                                                <th class="align-middle text-center" rowspan="2">UNIQUE NO.</th>
                                                <th class="align-middle text-center" rowspan="2">QTY</th>
                                                <th class="align-middle text-center" rowspan="2" colspan="5">PART NAME
                                                </th>
                                            <tr class="text-center fw-semibold">
                                                <th>REASON</th>
                                                <th>CONDITION</th>
                                            </tr>
                                            </tr>
                                            <?php
                                            if (!empty($data['dataLsrResult'])):
                                                foreach ($data['dataLsrResult'] as $index => $dataLsr): ?>
                                                    <tr class="align-middle text-center text-nowrap">
                                                        <td class="align-middle text-center"><?php echo (int) $index + 1; ?>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <?php echo htmlspecialchars(substr($dataLsr['reason'], 0, 1)); ?>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <?php echo htmlspecialchars(substr($dataLsr['condition'], 0, 1)); ?>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <?php echo htmlspecialchars(substr($dataLsr['repair'], 0, 1)); ?>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <?php echo htmlspecialchars($dataLsr['source_type']); ?>
                                                        </td>
                                                        <td colspan="4" class="align-middle text-center">
                                                            <?php echo htmlspecialchars($dataLsr['part_number']); ?>
                                                        </td>
                                                        <td class="align-middle text-center">0</td>
                                                        <td class="align-middle text-center">
                                                            <?php echo htmlspecialchars($dataLsr['uniqe_no']); ?>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <?php echo htmlspecialchars($dataLsr['qty']); ?>
                                                        </td>
                                                        <td colspan="2" class="align-middle text-center">
                                                            <?php echo htmlspecialchars($dataLsr['part_name']); ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach;
                                            else: ?>
                                                <tr>
                                                    <td colspan="14" class="align-middle text-center">Tidak ada data
                                                        tersedia.</td>
                                                </tr>
                                            <?php endif; ?>

                                            <?php
                                            // Buat dataLsrResult menjadi array dengan menghapus duplikat berdasarkan remarks
                                            $dataLsrResult = [];
                                            if (!empty($data['dataLsrResult'])) {
                                                foreach ($data['dataLsrResult'] as $dataLsr) {
                                                    $dataLsrResult[$dataLsr['remarks']] = $dataLsr['remarks'];
                                                }
                                                $dataLsrResult = array_values($dataLsrResult); // Reset keys array
                                            } else {
                                                $dataLsrResult = []; // Jika kosong, inisialisasi sebagai array kosong
                                            }
                                            ?>
                                            <tr class="text-center">
                                                <td colspan="5" rowspan="6">
                                                    <p class="text-start fw-semibold">REMARKS:</p>
                                                    <?php if (!empty($dataLsrResult)): ?>
                                                        <textarea rows="6" readonly
                                                            class="form-control"><?php echo implode(', ', $dataLsrResult); ?></textarea>
                                                    <?php else: ?>
                                                <tr>
                                                    <td colspan="14" class="align-middle text-center">Tidak ada data
                                                        tersedia.</td>
                                                </tr>
                                            <?php endif; ?>
                                            </td>
                                            <td class="text-center fw-semibold" colspan="9">FACTOR CODE</td>
                                            <tr class="text-center fw-semibold">
                                                <td colspan="8">REASON</td>
                                                <td>BOX CONDITION</td>
                                            </tr>
                                            <tr class="fw-semibold">
                                                <td colspan="4">
                                                    <p>A: Shortage/Missing</p>
                                                    <p>B: Wrong (Shortage)</p>
                                                    <p>C: Surplus</p>
                                                    <p>D: Damage Origin</p>
                                                    <p>E: Wrong (Surplus)</p>
                                                </td>
                                                <td colspan="4">
                                                    <p>F: Damage Handling</p>
                                                    <p>G: Rusted</p>
                                                    <p>H: Dented</p>
                                                    <p>I: Wet</p>
                                                    <p>Z: Other</p>
                                                </td>
                                                <td>
                                                    <p>-: Unknow</p>
                                                    <p>1: Good</p>
                                                    <p>2: Damage</p>
                                                    <p>3: From TMMIN Unpacking</p>
                                                </td>
                                            </tr>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr class="text-center fw-semibold">
                                                <td colspan="5" rowspan="3">
                                                    <p class="text-center text-decoration-underline text-nowrap">
                                                        KELENGKAPAN PERSETUJUAN (TANDA TANGAN FORMAT LSR)</p>
                                                    <p class="p-3">1. Reason LSR F-0 & F-6: Tanpa tanda tangan Quality
                                                    </p>
                                                    <p class="p-3">2. Reason LSR D0 : Wajib tanda tangan Quality
                                                    </p>
                                                </td>
                                                <td class="text-center align-middle" colspan="5">REQUESTED BY
                                                </td>
                                                <td class="text-center align-middle" colspan="2">APPROVED BY - QUALITY
                                                </td>
                                                <td class="text-center align-middle">RECEIVED BY - ORDERING</td>
                                                <td class="text-center align-middle">NO LSR</td>
                                            <tr>
                                                <td class="text-center" colspan="2" height="100px">
                                                    <?php echo $data['imgLH']; ?>
                                                </td>
                                                <td colspan="3" height="100px"><?php echo $data['imgSH']; ?></td>
                                                <td class="text-center align-middle" colspan="2" rowspan="2"
                                                    height="100px">
                                                    <?php echo $data['imgQc']; ?>
                                                </td>
                                                <td colspan="1" rowspan="2" height="100px"
                                                    class="text-center align-middle">
                                                    <?php echo $data['imgOrdering']; ?>
                                                </td>
                                                <td colspan="1" rowspan="2" height="100px"
                                                    class="text-center align-middle">
                                                    <span class="fs-4"><?php echo $_GET['no_lsr']; ?></span>
                                                </td>
                                            <tr>
                                                <td class="text-center fw-semibold" colspan="2">LH</td>
                                                <td class="text-center fw-semibold" colspan="3">SH</td>
                                            </tr>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold" colspan="14">Date created:
                                                    <span
                                                        style="margin-right: 6px;"><?php echo $data['dataLsr']['tanggal']; ?></span>
                                                    <span><?php echo $data['dataLsr']['waktu']; ?></span>
                                            </tr>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col utama -->
            </div>
    </section>
</main><!-- End #main -->