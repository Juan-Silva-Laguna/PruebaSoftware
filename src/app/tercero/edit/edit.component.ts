import { Component, OnInit } from '@angular/core';

import { TerceroService } from '../tercero.service';
import { ActivatedRoute, Router } from '@angular/router';
import { FormGroup, FormControl, Validators} from '@angular/forms';
import { Tercero } from '../tercero';

@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.css']
})
export class EditComponent implements OnInit {

  id: number;
  tercero: Tercero;
  form: FormGroup;
  tipoIdentificacion: {};
  tipoTercero: {};
  departamentos: {};
  ciudades: {};
  tiposContribuyentes: {};

  constructor(
    public terceroService: TerceroService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    this.terceroService.getTipoTercero().subscribe((data: Tercero[])=>{
      this.tipoTercero = data;
    });

    this.terceroService.getTipoIdentificacion().subscribe((data: Tercero[])=>{
      this.tipoIdentificacion = data;
    });

    this.terceroService.getDepartamento().subscribe((data: Tercero[])=>{
      this.departamentos = data;
    });

    this.terceroService.getCiudad().subscribe((data: Tercero[])=>{
      this.ciudades = data;
    });

    this.terceroService.getTipoContribuyente().subscribe((data: Tercero[])=>{
      this.tiposContribuyentes = data;
    });

    this.id = this.route.snapshot.params['idTercero'];
    this.terceroService.find(this.id).subscribe((data: Tercero)=>{
      this.tercero = data;
    });

    this.form = new FormGroup({
      tipo_identificacion_id: new FormControl('', [ Validators.required, Validators.pattern("^[0-9]*$") ]),
      numero_identificacion: new FormControl('', [ Validators.required, Validators.pattern("^[0-9]*$") ]),
      tipo_tercero_id: new FormControl('', [ Validators.required, Validators.pattern("^[0-9]*$") ]),
      nombre1:  new FormControl('', [ Validators.required, Validators.pattern('^[a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ \-\']+') ]),
      nombre2:  new FormControl('', [ Validators.required, Validators.pattern('^[a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ \-\']+') ]),
      apellido1:  new FormControl('', [ Validators.required, Validators.pattern('^[a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ \-\']+') ]),
      apellido2:  new FormControl('', [ Validators.required, Validators.pattern('^[a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ \-\']+') ]),
      departamento_id: new FormControl('', [ Validators.required, Validators.pattern("^[0-9]*$") ]),
      idmunicipio_id: new FormControl('', [ Validators.required, Validators.pattern("^[0-9]*$") ]),
      tipo_contribuyente_id: new FormControl('', [ Validators.required, Validators.pattern("^[0-9]*$") ])
    });

  }

  get f(){
    return this.form.controls;
  }

  submit(){
    console.log(this.form.value);
    this.terceroService.update(this.id, this.form.value).subscribe(res => {
         console.log('Tercero actualizado satisfactoriamente!');
         this.router.navigateByUrl('tercero/index');
    })
  }

}
