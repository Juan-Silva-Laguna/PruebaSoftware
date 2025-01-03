import { Component, OnInit } from '@angular/core';
import { TerceroService } from '../tercero.service';
import { Router } from '@angular/router';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { Tercero } from '../tercero';

@Component({
  selector: 'app-create',
  templateUrl: './create.component.html',
  styleUrls: ['./create.component.css']
})
export class CreateComponent implements OnInit {
  form: FormGroup;  
  tipoIdentificacion: {};
  tipoTercero: {};
  departamentos: {};
  ciudades: {};
  tiposContribuyentes: {};
  constructor(
    public terceroService: TerceroService,
    private router: Router,
  ) { }

  ngOnInit(): void {
    this.terceroService.getTipoTercero().subscribe((data: Tercero[])=>{
      this.tipoTercero = data;
      console.log(this.tipoTercero);
    });

    this.terceroService.getTipoIdentificacion().subscribe((data: Tercero[])=>{
      this.tipoIdentificacion = data;
      console.log(this.tipoIdentificacion);
    });

    this.terceroService.getDepartamento().subscribe((data: Tercero[])=>{
      this.departamentos = data;
      console.log(this.departamentos);
    });

    this.terceroService.getCiudad().subscribe((data: Tercero[])=>{
      this.ciudades = data;
      console.log(this.ciudades);
    });

    this.terceroService.getTipoContribuyente().subscribe((data: Tercero[])=>{
      this.tiposContribuyentes = data;
      console.log(this.tiposContribuyentes);
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
    this.terceroService.create(this.form.value).subscribe(res => {
         console.log('Tercero creado correctamente!');
         this.router.navigateByUrl('tercero/index');
    })
  }


}
